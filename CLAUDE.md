# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP client package for integrating with the SevDesk API using Saloon v3. SevDesk is a German accounting and invoicing software. The package can be used standalone or with Laravel.

## Technology Stack

- PHP 8.1+
- Laravel 10.x/11.x
- Saloon 3.0 (HTTP client library)
- PHPUnit 10.0 with Orchestra Testbench

## Common Development Commands

```bash
# Install dependencies
composer install

# Run tests
./vendor/bin/phpunit

# Run specific test
./vendor/bin/phpunit tests/Unit/ExampleTest.php
./vendor/bin/phpunit --filter test_method_name

# Generate autoload files
composer dump-autoload

# Regenerate SDK from OpenAPI spec
./vendor/bin/sdkgenerator generate:sdk resources/openapi/sevdesk-openapi-$(date +%Y-%m-%d).yaml \
  --type=openapi \
  --name="SevDesk" \
  --namespace="Ameax\\SevDeskApi" \
  --output="./src" \
  --force

# Check code standards (when configured)
# Note: No code style tools are currently configured
```

## Code Architecture

### Saloon Structure
The package follows Saloon's recommended architecture:

1. **Connectors** (`src/Connectors/`): Base API connector classes that define the API base URL, headers, and authentication
2. **Requests** (`src/Requests/`): Individual API endpoint request classes
3. **Resources** (`src/Resources/`): Logical groupings of related requests (e.g., ContactResource, InvoiceResource)
4. **Data** (`src/Data/`): Data Transfer Objects (DTOs) for type-safe request/response handling
5. **Enums** (`src/Enums/`): Enumeration classes for API constants

### Laravel Integration
- Service Provider: `Ameax\SevDeskApi\SevDeskApiServiceProvider`
- Configuration: Published to `config/sevdesk.php` (when implemented)
- Namespace: `Ameax\SevDeskApi`

### OpenAPI Resources
- OpenAPI specifications are stored in `resources/openapi/` with timestamps
- Use these to track API changes and regenerate the SDK when needed
- See `resources/openapi/README.md` for update instructions

## Development Guidelines

### When Creating New API Endpoints
1. Create a Request class in `src/Requests/` extending Saloon's Request class
2. Define the HTTP method and endpoint
3. Add any required parameters, query parameters, or body data
4. Create corresponding DTO in `src/Data/` if handling structured responses
5. Add the request to the appropriate Resource class

### Testing Approach
- Unit tests for individual components in `tests/Unit/`
- Feature tests for API integration in `tests/Feature/`
- Use Orchestra Testbench for Laravel-specific testing features
- Mock HTTP responses using Saloon's built-in testing helpers

## SevDesk API Reference
- API Documentation: https://api.sevdesk.de/
- Authentication: API token-based
- Base URL: https://my.sevdesk.de/api/v1/

## SDK Usage Examples

### Standalone Usage (Without Laravel)
```php
use Ameax\SevDeskApi\SevDesk;

// Simple initialization
$sevdesk = new SevDesk('your_api_token');

// With configuration array
$sevdesk = new SevDesk([
    'api_token' => 'your_api_token',
    'base_url' => 'https://my.sevdesk.de/api/v1',
    'user_agent' => 'My App/1.0',
    'timeout' => 60,
]);

// Configure after initialization
$sevdesk = new SevDesk();
$sevdesk->setApiToken('your_api_token')
    ->setConfig('timeout', 60);
```

### Laravel Usage
1. Publish the configuration file:
```bash
php artisan vendor:publish --tag=sevdesk-config
```

2. Add your SevDesk API token to `.env`:
```
SEVDESK_API_TOKEN=your_32_character_hexadecimal_token
```

3. Use via dependency injection or service container:
```php
use Ameax\SevDeskApi\SevDesk;

// Get from container
$sevdesk = app(SevDesk::class);

// Or via dependency injection
public function __construct(private SevDesk $sevdesk) {}
```

### API Examples
```php
// Get contacts with filtering
$response = $sevdesk->contact()->getContacts([
    'depth' => 1,
    'limit' => 50,
    'offset' => 0,
]);

// Create invoice
$response = $sevdesk->invoice()->createInvoiceByFactory([
    'invoice' => [
        'invoiceNumber' => 'RE-10001',
        'contact' => ['id' => 123, 'objectName' => 'Contact'],
        'invoiceDate' => date('Y-m-d'),
        'header' => 'Invoice Header',
        'status' => 100, // Draft
    ],
    'invoicePosSave' => [
        [
            'quantity' => 1,
            'price' => 100.00,
            'name' => 'Service',
            'unity' => ['id' => 1, 'objectName' => 'Unity'],
            'taxRate' => 19,
        ]
    ]
]);
```

### Working with Resources
Each resource (Contact, Invoice, Order, etc.) has its own set of methods:
- `contact()` - Manage contacts
- `invoice()` - Manage invoices
- `order()` - Manage orders
- `voucher()` - Manage vouchers
- `creditNote()` - Manage credit notes
- `checkAccount()` - Manage bank accounts
- `part()` - Manage products/services