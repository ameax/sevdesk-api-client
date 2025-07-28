# SevDesk Tax Rules Documentation

This document explains the tax rules (taxRule) system in SevDesk API Update 2.0.

## Migration from taxType to taxRule

With SevDesk Update 2.0, the API has transitioned from using `taxType` to `taxRule`. While `taxType` is still supported for backward compatibility, it's recommended to use `taxRule` for new implementations.

## Available Tax Rules

The following tax rules are available in the SevDesk API:

### Standard Tax Rules (from Enum)

| ID | Constant Name | Description | German Name |
|----|--------------|-------------|-------------|
| 1 | `STANDARD` | Standard tax rate (19% in Germany) | Umsatzsteuerpflichtige Umsätze |
| 2 | `REDUCED` | Reduced tax rate (7% in Germany) | Ermäßigter Steuersatz |
| 3 | `TAX_FREE_EU` | Tax-free export to EU | Steuerfreie Ausfuhr EU |
| 4 | `TAX_FREE_NON_EU` | Tax-free export to non-EU | Steuerfreie Ausfuhr Drittland |
| 5 | `REVERSE_CHARGE` | Reverse charge procedure | Reverse Charge gem. §13b UStG |
| 8 | `INNER_COMMUNITY_ACQUISITION_EXPENSE` | Inner-community acquisitions (expense) | Innergemeinschaftliche Erwerbe |
| 9 | `CREDIT_NOTE_STANDARD` | Tax rule for credit notes | Used specifically for credit notes |
| 10 | `NON_DEDUCTIBLE_EXPENSES` | Non-deductible expenses | Nicht vorsteuerabziehbare Aufwendungen |
| 11 | `SMALL_BUSINESS` | Small business regulation | Steuer nicht erhoben nach §19 UStG (Kleinunternehmer) |
| 12 | `REVERSE_CHARGE_WITH_INPUT_TAX` | Reverse Charge with input tax deduction | Reverse Charge gem. §13b Abs. 2 UStG mit Vorsteuerabzug 0% (19%) |
| 13 | `REVERSE_CHARGE_WITHOUT_INPUT_TAX` | Reverse Charge without input tax deduction | Reverse Charge gem. §13b UStG ohne Vorsteuerabzug 0% (19%) |
| 14 | `REVERSE_CHARGE_EU` | Reverse Charge for EU transactions | Reverse Charge gem. §13b Abs. 1 EU Umsätze 0% (19%) |
| 17 | `INNER_COMMUNITY_ACQUISITION` | Inner-community acquisition | Innergemeinschaftlicher Erwerb |
| 18 | `TAX_FREE_PARAGRAPH_4` | Tax-free according to §4 Nr. 8ff UStG | Steuerfrei nach §4 Nr. 8ff UStG |
| 19 | `CONSTRUCTION_SERVICES` | Construction services according to §13b UStG | Bauleistungen gem. §13b UStG |
| 20 | `TRIANGULAR_TRANSACTION` | Inner-community triangular transaction | Innergemeinschaftliches Dreiecksgeschäft |
| 21 | `OTHER_SERVICES` | Other services according to §13b UStG | Sonstige Leistungen gem. §13b UStG |


## Usage Examples

### For Invoices

```php
use Ameax\SevDeskApi\Enums\TaxRule;

$invoiceData = [
    'invoice' => [
        // ... other fields
        'taxRule' => [
            'id' => (string) TaxRule::STANDARD, // For standard 19% VAT
            'objectName' => 'TaxRule'
        ],
        'taxRate' => 19,
        'taxType' => 'default', // Optional, for backward compatibility
        // ...
    ]
];
```

### For Credit Notes

```php
use Ameax\SevDeskApi\Enums\TaxRule;
use Ameax\SevDeskApi\Enums\BookingCategory;

$creditNoteData = [
    'creditNote' => [
        // ... other fields
        'taxRule' => [
            'id' => (string) TaxRule::CREDIT_NOTE_STANDARD, // ID 9
            'objectName' => 'TaxRule'
        ],
        'bookingCategory' => BookingCategory::ROYALTY_UNASSIGNED,
        // ...
    ]
];
```

### For Small Business (Kleinunternehmer)

```php
use Ameax\SevDeskApi\Enums\TaxRule;

$invoiceData = [
    'invoice' => [
        // ... other fields
        'taxRule' => [
            'id' => (string) TaxRule::SMALL_BUSINESS, // ID 11
            'objectName' => 'TaxRule'
        ],
        'taxRate' => 0, // No tax for small business
        // ...
    ]
];
```

### For Reverse Charge Scenarios

```php
use Ameax\SevDeskApi\Enums\TaxRule;

// For EU services with reverse charge
$invoiceData = [
    'invoice' => [
        // ... other fields
        'taxRule' => [
            'id' => (string) TaxRule::REVERSE_CHARGE_EU, // ID 14
            'objectName' => 'TaxRule'
        ],
        'taxRate' => 0, // Always 0% for reverse charge
        // ...
    ]
];

// For construction services
$invoiceData = [
    'invoice' => [
        // ... other fields
        'taxRule' => [
            'id' => (string) TaxRule::CONSTRUCTION_SERVICES, // ID 19
            'objectName' => 'TaxRule'
        ],
        'taxRate' => 0, // Construction services use 0% with reverse charge
        // ...
    ]
];
```

### For Expenses (Vouchers)

```php
use Ameax\SevDeskApi\Enums\TaxRule;

// For non-deductible expenses
$voucherData = [
    'voucher' => [
        // ... other fields
        'taxRule' => [
            'id' => (string) TaxRule::NON_DEDUCTIBLE_EXPENSES, // ID 10
            'objectName' => 'TaxRule'
        ],
        'taxRate' => 0, // Always 0% for non-deductible expenses
        // ...
    ]
];

// For inner-community acquisitions
$voucherData = [
    'voucher' => [
        // ... other fields
        'taxRule' => [
            'id' => (string) TaxRule::INNER_COMMUNITY_ACQUISITION_EXPENSE, // ID 8
            'objectName' => 'TaxRule'
        ],
        'taxRate' => 19, // Can be 0%, 7%, or 19%
        // ...
    ]
];
```

## Tax Rule and Tax Rate Compatibility

Not all tax rates are compatible with all tax rules. Here are the allowed combinations:

| Tax Rule | Allowed Tax Rates | Notes |
|----------|-------------------|-------|
| STANDARD (1) | 7%, 19% | Standard German VAT rates |
| REDUCED (2) | 7% | Reduced rate only |
| TAX_FREE_EU (3) | 0% | Always 0% for tax-free exports |
| TAX_FREE_NON_EU (4) | 0% | Always 0% for tax-free exports |
| REVERSE_CHARGE (5) | 0% | Always 0% for reverse charge |
| INNER_COMMUNITY_ACQUISITION_EXPENSE (8) | 0%, 7%, 19% | All rates allowed |
| CREDIT_NOTE_STANDARD (9) | 0%, 7%, 19% | Typically matches original invoice |
| NON_DEDUCTIBLE_EXPENSES (10) | 0% | Always 0% |
| SMALL_BUSINESS (11) | 0% | Always 0% for Kleinunternehmer |
| REVERSE_CHARGE_WITH_INPUT_TAX (12) | 0% | Always 0% |
| REVERSE_CHARGE_WITHOUT_INPUT_TAX (13) | 0% | Always 0% |
| REVERSE_CHARGE_EU (14) | 0% | Always 0% |
| CONSTRUCTION_SERVICES (19) | 0% | Always 0% |
| Other reverse charge rules | 0% | Generally 0% for reverse charge |

## Important Notes

1. **Tax Rule Compatibility**: The tax rate used in positions must be compatible with the tax rule used in the document header. Otherwise, the API returns a validation error (HTTP 422).

2. **Credit Note Limitation**: Credit notes with `bookingCategory: "ACCOUNTING_TYPE"` are not supported in SevDesk Update 2.0. Use other booking categories like `ROYALTY_UNASSIGNED`.

3. **Advanced Invoices**: Advanced invoices (invoiceType: 'AR') and partial invoices (invoiceType: 'TR') can only be created with tax rules 1 (STANDARD) or 11 (SMALL_BUSINESS).

4. **String Conversion**: Always convert the tax rule ID to a string when sending to the API, as shown in the examples.

## Validation

To ensure your tax rule is valid, you can:

1. Check existing documents in your SevDesk account to see which tax rules they use
2. Use the provided enum constants to avoid hardcoding IDs
3. Test with the API and check for 422 validation errors

## Future Updates

SevDesk may add new tax rules in the future. Always check the official API documentation or use the discovery script (`list-sevdesk-tax-rules.php`) to find newly available tax rules.