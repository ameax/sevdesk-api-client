<?php

// This example shows how to use the package in a Laravel application

use Ameax\SevDeskApi\SevDesk;

// In a Laravel controller or service class:
class InvoiceController extends Controller
{
    private SevDesk $sevdesk;
    
    // Dependency injection
    public function __construct(SevDesk $sevdesk)
    {
        $this->sevdesk = $sevdesk;
    }
    
    public function index()
    {
        // Get invoices
        $response = $this->sevdesk->invoice()->getInvoices([
            'status' => 200, // Open invoices
            'limit' => 50,
        ]);
        
        return response()->json($response->json());
    }
    
    public function createInvoice(Request $request)
    {
        $response = $this->sevdesk->invoice()->createInvoiceByFactory([
            'invoice' => [
                'invoiceNumber' => 'RE-' . time(),
                'contact' => [
                    'id' => $request->contact_id,
                    'objectName' => 'Contact'
                ],
                'invoiceDate' => now()->format('Y-m-d'),
                'status' => 100, // Draft
                'header' => 'Invoice for services',
                'addressCountry' => [
                    'id' => 1,
                    'objectName' => 'StaticCountry'
                ],
            ],
            'invoicePosSave' => [
                [
                    'quantity' => 1,
                    'price' => 100.00,
                    'name' => 'Consulting Service',
                    'unity' => [
                        'id' => 1,
                        'objectName' => 'Unity'
                    ],
                    'taxRate' => 19,
                ]
            ]
        ]);
        
        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'invoice' => $response->json()
            ]);
        }
        
        return response()->json([
            'success' => false,
            'error' => $response->body()
        ], 400);
    }
}

// In a service class
class SevDeskService
{
    public function __construct(
        private SevDesk $sevdesk
    ) {}
    
    public function syncContacts()
    {
        $response = $this->sevdesk->contact()->getContacts([
            'limit' => 1000,
            'embed' => 'category,addresses,communicationWays'
        ]);
        
        if ($response->successful()) {
            $contacts = $response->json()['objects'];
            
            foreach ($contacts as $contact) {
                // Sync with local database
                Contact::updateOrCreate(
                    ['sevdesk_id' => $contact['id']],
                    [
                        'name' => $contact['name'],
                        'customer_number' => $contact['customerNumber'],
                        'email' => $this->extractEmail($contact),
                        'updated_at' => now(),
                    ]
                );
            }
            
            return count($contacts);
        }
        
        throw new \Exception('Failed to sync contacts');
    }
    
    private function extractEmail($contact)
    {
        if (!isset($contact['communicationWays'])) {
            return null;
        }
        
        foreach ($contact['communicationWays'] as $way) {
            if ($way['type'] === 'EMAIL') {
                return $way['value'];
            }
        }
        
        return null;
    }
}