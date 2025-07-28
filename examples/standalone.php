<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ameax\SevDeskApi\SevDesk;

// Example 1: Simple initialization with API token
$sevdesk = new SevDesk('your_api_token_here');

// Example 2: Initialize with configuration array
$sevdesk = new SevDesk([
    'api_token' => 'your_api_token_here',
    'base_url' => 'https://my.sevdesk.de/api/v1',
    'user_agent' => 'My Custom App/1.0',
    'timeout' => 30,
]);

// Example 3: Configure after initialization
$sevdesk = new SevDesk();
$sevdesk->setApiToken('your_api_token_here')
    ->setConfig('user_agent', 'My App/2.0')
    ->setConfig('timeout', 60);

try {
    // Get all contacts
    echo "Fetching contacts...\n";
    $response = $sevdesk->contact()->getContacts([
        'limit' => 10,
        'offset' => 0,
    ]);
    
    $contacts = $response->json();
    echo "Found " . count($contacts['objects']) . " contacts\n";
    
    // Get next customer number
    $response = $sevdesk->contact()->getNextCustomerNumber();
    $nextNumber = $response->json();
    echo "Next customer number: " . $nextNumber['objects'] . "\n";
    
    // Create a new contact
    $response = $sevdesk->contact()->createContact([
        'name' => 'Test Customer',
        'customerNumber' => $nextNumber['objects'],
        'category' => [
            'id' => 3, // Customer category
            'objectName' => 'Category'
        ],
    ]);
    
    if ($response->successful()) {
        $newContact = $response->json();
        echo "Created contact with ID: " . $newContact['objects']['id'] . "\n";
    }
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}