# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP client package for integrating with the SevDesk API using Saloon v3. SevDesk is a German accounting and invoicing software. The package can be used standalone or with Laravel.

## Technology Stack

- PHP 8.1+
- Laravel 10.x/11.x (optional)
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
The package follows Saloon v3's recommended architecture:

1. **Main Connector** (`src/SevDesk.php`): The primary entry point that extends Saloon's Connector class
2. **Requests** (`src/Requests/`): Individual API endpoint request classes organized by feature area
3. **Resources** (`src/Resource/`): Logical groupings of related requests (note: singular "Resource" directory)
4. **Enums** (`src/Enums/`): Constant classes for API values organized by:
   - `Status/` - Status values for various entities (Invoice, Order, Voucher, etc.)
   - `Type/` - Type values for different API objects
   - Root level - Other API constants (ObjectName, TaxRule, etc.)

### Laravel Integration
- Service Provider: `Ameax\SevDeskApi\SevDeskApiServiceProvider`
- Configuration: Published to `config/sevdesk.php`
- Namespace: `Ameax\SevDeskApi`
- Auto-discovery: Enabled via composer.json

### OpenAPI Resources
- OpenAPI specifications are stored in `resources/openapi/` with timestamps
- Use these to track API changes and regenerate the SDK when needed
- See `resources/openapi/README.md` for update instructions

## Development Guidelines

### When Creating New API Endpoints
1. Create a Request class in `src/Requests/` extending Saloon's Request class
2. Define the HTTP method and endpoint
3. Add any required parameters, query parameters, or body data
4. Add the request to the appropriate Resource class
5. Use enum constants from `src/Enums/` for type-safe values

### Testing Approach
- Unit tests for individual components in `tests/Unit/`
- Feature tests for API integration in `tests/Feature/`
- Use Orchestra Testbench for Laravel-specific testing features
- Mock HTTP responses using Saloon's built-in testing helpers

## SevDesk API Reference
- API Documentation: https://api.sevdesk.de/
- Authentication: API token-based
- Base URL: https://my.sevdesk.de/api/v1/

## Available Enum Constants

### Status Enums (`src/Enums/Status/`)
- `InvoiceStatus` - Invoice statuses (DRAFT, OPEN, SENT, PARTIAL, CANCELLED)
- `OrderStatus` - Order statuses (DRAFT, SENT, ACCEPTED, PARTIALLY_DELIVERED, DELIVERED, CANCELLED)
- `CreditNoteStatus` - Credit note statuses (DRAFT, OPEN, SENT, PARTIALLY_PAID, PAID, CANCELLED)
- `VoucherStatus` - Voucher statuses (DRAFT, OPEN, PAID)
- `CheckAccountStatus` - Bank account statuses (ARCHIVED, ACTIVE)
- `CheckAccountTransactionStatus` - Transaction statuses (CREATED, LINKED, PRIVATE, AUTO_BOOKED, BOOKED)
- `PartStatus` - Product/service statuses (INACTIVE, ACTIVE)

### Type Enums (`src/Enums/Type/`)
- `InvoiceType` - Invoice types (INVOICE, RECURRING, CANCELLATION, REMINDER, PARTIAL, ADVANCE_PAYMENT, FINAL)
- `OrderType` - Order types (QUOTE, ORDER, DELIVERY_NOTE)
- `CommunicationWayType` - Communication types (EMAIL, PHONE, WEB, MOBILE)
- `SendType` - Document send types (PRINT, POSTAL, EMAIL, PDF)
- `VoucherType` - Voucher types (VOUCHER, SUPPLIER_INVOICE)
- `CheckAccountType` - Bank account types (ONLINE, OFFLINE, REGISTER)
- `TaxType` - Tax types (DEFAULT, EU, NON_EU, CUSTOM)

### Other Enums (`src/Enums/`)
- `ObjectName` - API object names (INVOICE, ORDER, CONTACT, etc.)
- `TaxRule` - German tax rule IDs (STANDARD, REDUCED, TAX_FREE_EU, etc.)
- `CreditDebit` - Accounting indicators (CREDIT, DEBIT)
- `RecurringInterval` - Recurring intervals (WEEKLY, MONTHLY, QUARTERLY, etc.)
- `BookingCategory` - Booking categories (PROVISION, ROYALTY_ASSIGNED, etc.)
- `CommunicationWayKey` - Contact categories (WORK, MOBILE, PRIVATE, etc.)
- `ImportType` - Import formats (CSV, MT940)
- `Version` - API versions (V1, V2)

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
use Ameax\SevDeskApi\Enums\Status\InvoiceStatus;
use Ameax\SevDeskApi\Enums\Type\SendType;
use Ameax\SevDeskApi\Enums\ObjectName;

// Get contacts with filtering
$response = $sevdesk->contact()->getContacts([
    'depth' => 1,
    'limit' => 50,
    'offset' => 0,
]);

// Create invoice using enum constants
$response = $sevdesk->invoice()->createInvoiceByFactory([
    'invoice' => [
        'invoiceNumber' => 'RE-10001',
        'contact' => ['id' => 123, 'objectName' => ObjectName::CONTACT],
        'invoiceDate' => date('Y-m-d'),
        'header' => 'Invoice Header',
        'status' => InvoiceStatus::DRAFT,
    ],
    'invoicePosSave' => [
        [
            'quantity' => 1,
            'price' => 100.00,
            'name' => 'Service',
            'unity' => ['id' => 1, 'objectName' => ObjectName::UNITY],
            'taxRate' => 19,
        ]
    ]
]);

// Send invoice by email
$sevdesk->invoice()->sendInvoiceViaEmail($invoiceId, [
    'toEmail' => 'customer@example.com',
    'subject' => 'Your Invoice',
    'text' => 'Please find your invoice attached.',
    'sendType' => SendType::EMAIL,
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
- `accountingType()` - Manage accounting types
- `checkAccountTransaction()` - Manage bank transactions
- `communicationWay()` - Manage communication methods
- `country()` - Country data
- `deliveryNote()` - Manage delivery notes
- `discounts()` - Manage discounts
- `documentFolder()` - Document management
- `export()` - Export functionality
- `layout()` - Layout management
- `orderPos()` - Order positions
- `report()` - Reporting features
- `supplier()` - Supplier management
- `tag()` - Tag management
- `unity()` - Units of measurement

## Environment Variables

For Laravel projects, configure these in your `.env`:
```
SEVDESK_API_TOKEN=your_32_character_hexadecimal_token
SEVDESK_BASE_URL=https://my.sevdesk.de/api/v1  # optional
SEVDESK_TIMEOUT=30                              # optional
SEVDESK_RETRY_TIMES=3                           # optional
SEVDESK_RETRY_SLEEP=1000                        # optional
```

## Known Issues

1. **No Tests**: Test directories exist but no test files have been created yet.
2. **No phpunit.xml**: PHPUnit configuration file is missing.