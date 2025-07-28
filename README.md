# SevDesk API Client

A flexible PHP client for integrating with the SevDesk API using Saloon v3. This package can be used standalone or with Laravel.

## Disclaimer

This package is an unofficial API client for SevDesk. It is not affiliated with, officially maintained, or endorsed by SevDesk GmbH. SevDesk is a trademark of SevDesk GmbH.

This package is provided as-is for integration purposes. Users must comply with SevDesk's API terms of service.

## Installation

You can install the package via composer:

```bash
composer require ameax/sevdesk-api-client
```

## Usage

### Standalone Usage (Without Laravel)

You can use this package without Laravel by manually configuring the connector:

```php
use Ameax\SevDeskApi\SevDesk;

// Option 1: Simple initialization with API token
$sevdesk = new SevDesk('your_32_character_hexadecimal_token');

// Option 2: Initialize with array configuration
$sevdesk = new SevDesk([
    'api_token' => 'your_32_character_hexadecimal_token',
    'base_url' => 'https://my.sevdesk.de/api/v1', // optional, this is the default
    'user_agent' => 'My App/1.0', // optional
]);

// Option 3: Initialize and configure separately
$sevdesk = new SevDesk();
$sevdesk->setApiToken('your_32_character_hexadecimal_token')
    ->setConfig('timeout', 60);

// Use the API
$response = $sevdesk->contact()->getContacts();
$contacts = $response->json();
```

### Laravel Usage (With Service Provider)

#### Configuration

1. Publish the configuration file:
```bash
php artisan vendor:publish --tag=sevdesk-config
```

2. Add your SevDesk API token to your `.env` file:
```
SEVDESK_API_TOKEN=your_32_character_hexadecimal_token
```

#### Usage in Laravel

```php
use Ameax\SevDeskApi\SevDesk;

// Get the SevDesk instance from the container
$sevdesk = app(SevDesk::class);

// Or use dependency injection
public function __construct(private SevDesk $sevdesk) {}

// Use the API
$response = $sevdesk->contact()->getContacts();
$contacts = $response->json();
```

## Examples

### Working with Contacts

```php
// Get all contacts
$response = $sevdesk->contact()->getContacts();

// Get a specific contact
$response = $sevdesk->contact()->getContactById($contactId);

// Create a new contact
$response = $sevdesk->contact()->createContact([
    'name' => 'John Doe',
    'customerNumber' => '10001',
]);

// Update a contact
$response = $sevdesk->contact()->updateContact($contactId, [
    'name' => 'Jane Doe',
]);
```

### Working with Invoices

```php
// Get all invoices
$response = $sevdesk->invoice()->getInvoices();

// Create a new invoice
$response = $sevdesk->invoice()->createInvoiceByFactory([
    // invoice data
]);

// Send invoice via email
$response = $sevdesk->invoice()->sendInvoiceViaEmail($invoiceId, [
    'email' => 'customer@example.com',
    'subject' => 'Your Invoice',
    'text' => 'Please find attached your invoice.',
]);
```

## Available Resources

- **Contacts** - Customer and supplier management
- **Invoices** - Invoice creation and management
- **Orders** - Order processing
- **Credit Notes** - Credit note handling
- **Vouchers** - Expense tracking
- **Check Accounts** - Bank account management
- **Parts** - Product and service catalog
- **Tags** - Organization and categorization
- **Reports** - Financial reporting

## Testing

```bash
composer test
```

## Author

- **Michael Schmidt**

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.