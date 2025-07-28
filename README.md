# SevDesk API Client

A flexible PHP client for integrating with the SevDesk API using Saloon v3. This package can be used standalone or with Laravel.

## Disclaimer

This package is an unofficial API client for SevDesk. It is not affiliated with, officially maintained, or endorsed by SevDesk GmbH. SevDesk is a trademark of SevDesk GmbH.

This package is provided as-is for integration purposes. Users must comply with SevDesk's API terms of service.

## Requirements

- PHP 8.1 or higher
- Saloon v3

## Installation

You can install the package via composer:

```bash
composer require ameax/sevdesk-api-client
```

## Configuration

### Getting Your API Token

1. Log in to your SevDesk account
2. Go to Settings → Users & Rights → Users
3. Click on your user
4. In the "API Token" section, you'll find your 32-character hexadecimal token
5. Click "Generate new" if you need a new token

### Standalone Usage (Without Laravel)

```php
use Ameax\SevDeskApi\SevDesk;

// Option 1: Simple initialization with API token
$sevdesk = new SevDesk('your_32_character_hexadecimal_token');

// Option 2: Initialize with array configuration
$sevdesk = new SevDesk([
    'api_token' => 'your_32_character_hexadecimal_token',
    'base_url' => 'https://my.sevdesk.de/api/v1', // optional, this is the default
    'user_agent' => 'My App/1.0', // optional
    'timeout' => 30, // optional, in seconds
]);

// Option 3: Initialize and configure separately
$sevdesk = new SevDesk();
$sevdesk->setApiToken('your_32_character_hexadecimal_token')
    ->setConfig('timeout', 60)
    ->setConfig('user_agent', 'My App/1.0');
```

### Laravel Usage

#### 1. Publish Configuration (Optional)

If you want to use Laravel's configuration system:

```bash
php artisan vendor:publish --tag=sevdesk-config
```

#### 2. Add Environment Variables

Add your SevDesk API token to your `.env` file:

```
SEVDESK_API_TOKEN=your_32_character_hexadecimal_token
SEVDESK_BASE_URL=https://my.sevdesk.de/api/v1
SEVDESK_TIMEOUT=30
```

#### 3. Usage in Laravel

```php
use Ameax\SevDeskApi\SevDesk;

// Get the SevDesk instance from the container
$sevdesk = app(SevDesk::class);

// Or use dependency injection
public function __construct(private SevDesk $sevdesk) {}

// Or create a custom service
namespace App\Services;

use Ameax\SevDeskApi\SevDesk;

class SevDeskService
{
    protected SevDesk $connector;
    
    public function __construct(string $apiToken)
    {
        $this->connector = new SevDesk($apiToken);
    }
    
    public function connector(): SevDesk
    {
        return $this->connector;
    }
}
```

## Usage Examples

### Working with Contacts

```php
// Get all contacts (organizations and persons)
$response = $sevdesk->contact()->getContacts('1', null);
$contacts = $response->json('objects') ?? [];

// Get only organizations
$response = $sevdesk->contact()->getContacts('0', null);

// Get contact by customer number
$response = $sevdesk->contact()->getContacts(null, 'CUST-12345');

// Get a specific contact by ID
$response = $sevdesk->contact()->getContactById(123456);
$contact = $response->json('objects.0');

// Create a new contact (organization)
$request = new \Ameax\SevDeskApi\Requests\Contact\CreateContact();
$request->body()->set([
    'name' => 'ACME Corporation',
    'status' => 100, // 100 = Active
    'customerNumber' => 'CUST-' . time(),
    'category' => [
        'id' => 3, // 3 = Organization, 1 = Person
        'objectName' => 'Category'
    ],
    'description' => 'Important customer',
    'vatNumber' => 'DE123456789',
    'taxNumber' => '12/345/67890',
    'bankAccount' => 'DE89370400440532013000',
    'bankNumber' => 'COBADEFFXXX',
    'defaultTimeToPay' => 14,
]);
$response = $sevdesk->send($request);

// Delete a contact
$response = $sevdesk->contact()->deleteContact(123456);
```

### Working with Invoices

```php
// Get all invoices
$response = $sevdesk->invoice()->getInvoices(
    status: null,        // null for all, 50 = draft, 100 = open, 200 = paid
    invoiceNumber: null,
    startDate: null,
    endDate: null,
    contactId: null,
    contactObjectName: null
);
$invoices = $response->json('objects') ?? [];

// Get a specific invoice
$response = $sevdesk->invoice()->getInvoiceById($invoiceId);

// Create an invoice using the factory pattern
$request = new \Ameax\SevDeskApi\Requests\Invoice\CreateInvoiceByFactory();
$request->body()->set([
    'invoice' => [
        'invoiceNumber' => 'RE-10001',
        'contact' => [
            'id' => 123456,
            'objectName' => 'Contact'
        ],
        'invoiceDate' => date('Y-m-d'),
        'header' => 'Invoice for Services',
        'status' => 100, // 100 = Draft
        'taxType' => 'default',
        'invoiceType' => 'RE', // RE = Invoice
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
$response = $sevdesk->send($request);

// Send invoice via email
$request = new \Ameax\SevDeskApi\Requests\Invoice\SendInvoiceViaEmail($invoiceId);
$request->body()->set([
    'toEmail' => 'customer@example.com',
    'subject' => 'Your Invoice',
    'text' => 'Please find your invoice attached.',
]);
$response = $sevdesk->send($request);

// Get invoice PDF
$response = $sevdesk->invoice()->invoiceGetPdf($invoiceId, download: true, preventSendBy: false);
```

### Working with Check Accounts (Bank Accounts)

```php
// Get all check accounts
$response = $sevdesk->checkAccount()->getCheckAccounts();
$accounts = $response->json('objects') ?? [];

// Get account balance at specific date
$response = $sevdesk->checkAccount()->getBalanceAtDate(
    checkAccountId: 123456,
    date: '2024-12-31'
);
```

### Working with Parts (Products/Services)

```php
// Get all parts
$response = $sevdesk->part()->getParts();
$parts = $response->json('objects') ?? [];

// Create a new part
$request = new \Ameax\SevDeskApi\Requests\Part\CreatePart();
$request->body()->set([
    'name' => 'Consulting Hour',
    'partNumber' => 'SERV-001',
    'stock' => 0,
    'unity' => [
        'id' => 1, // 1 = Piece
        'objectName' => 'Unity'
    ],
    'price' => 150.00,
    'priceNet' => 150.00,
    'priceGross' => 178.50,
    'pricePurchase' => null,
    'taxRate' => 19,
    'status' => 100, // 100 = Active
]);
$response = $sevdesk->send($request);
```

### Error Handling

```php
try {
    $response = $sevdesk->contact()->getContacts('1', null);
    
    if ($response->successful()) {
        $contacts = $response->json('objects') ?? [];
        // Process contacts
    } else {
        // Handle API error
        $error = $response->json();
        $statusCode = $response->status();
        
        switch ($statusCode) {
            case 401:
                throw new Exception('Invalid API token');
            case 404:
                throw new Exception('Resource not found');
            case 422:
                throw new Exception('Validation error: ' . json_encode($error));
            default:
                throw new Exception('API error: ' . $response->body());
        }
    }
} catch (\Exception $e) {
    // Handle exception
    logger()->error('SevDesk API error: ' . $e->getMessage());
}
```

## Available Resources

Each resource provides methods for interacting with specific SevDesk entities:

### Core Resources

- `$sevdesk->contact()` - Customer and supplier management
- `$sevdesk->invoice()` - Invoice creation and management
- `$sevdesk->order()` - Order processing
- `$sevdesk->creditNote()` - Credit note handling
- `$sevdesk->voucher()` - Expense tracking
- `$sevdesk->part()` - Product and service catalog

### Financial Resources

- `$sevdesk->checkAccount()` - Bank account management
- `$sevdesk->checkAccountTransaction()` - Bank transactions
- `$sevdesk->accountingContact()` - Accounting-specific contacts

### Supporting Resources

- `$sevdesk->tag()` - Organization and categorization
- `$sevdesk->communicationWay()` - Contact communication methods
- `$sevdesk->contactAddress()` - Contact addresses
- `$sevdesk->layout()` - Document layouts
- `$sevdesk->export()` - Data export functionality
- `$sevdesk->report()` - Financial reporting

## Common Patterns

### Pagination

Most list endpoints support pagination:

```php
$limit = 50;
$offset = 0;

do {
    $response = $sevdesk->contact()->getContacts('1', null);
    // Note: The SDK's getContacts method doesn't support limit/offset parameters directly
    // You would need to modify the request or use the raw API
    
    $contacts = $response->json('objects') ?? [];
    
    // Process contacts
    foreach ($contacts as $contact) {
        // Process each contact
    }
    
    $offset += $limit;
} while (count($contacts) >= $limit);
```

### Filtering and Searching

Many endpoints support filtering through query parameters:

```php
// Search contacts by various criteria
// Note: These would require custom requests as the SDK methods have limited parameters
$request = new \Saloon\Http\Request();
$request->setMethod('GET');
$request->setEndpoint('/Contact');
$request->query()->add([
    'depth' => 1,
    'name' => 'ACME',     // Search by name
    'email' => '@acme.com', // Search by email
    'limit' => 100,
]);
$response = $sevdesk->send($request);
```

### Working with Enums

The package includes various enum classes for type-safe values:

```php
use Ameax\SevDeskApi\Enums\Status\InvoiceStatus;
use Ameax\SevDeskApi\Enums\Type\InvoiceType;
use Ameax\SevDeskApi\Enums\ObjectName;

// Use enum values
$status = InvoiceStatus::DRAFT; // 100
$type = InvoiceType::INVOICE; // 'RE'
$objectName = ObjectName::CONTACT; // 'Contact'
```

## Troubleshooting

### Common Issues

1. **Authentication Error (401)**
   - Verify your API token is correct
   - Check if the token has been regenerated in SevDesk
   - Ensure the token is exactly 32 characters

2. **Not Found Error (404)**
   - Check if the resource ID exists
   - Verify you're using the correct endpoint
   - Some resources may have been deleted

3. **Validation Error (422)**
   - Check required fields are provided
   - Verify data types match API expectations
   - Review the error response for specific field errors

4. **Timeout Errors**
   - Increase the timeout in configuration
   - Check your network connection
   - SevDesk API might be experiencing high load

### Debug Mode

Enable debug mode to see detailed request/response information:

```php
// For Saloon v3, you can add middleware or use Laravel's HTTP client debugging
$sevdesk->getConfig('debug', true);
```

## Limitations

- The current version of the SDK has limited support for request body parameters in some update methods
- Some endpoints may require custom requests for advanced filtering
- Bulk operations are not directly supported by all resources

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Support

For API-specific questions, refer to the [SevDesk API documentation](https://api.sevdesk.de/).

For package-specific issues, please create an issue on GitHub.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.