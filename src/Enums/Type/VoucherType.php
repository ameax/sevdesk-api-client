<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Type;

/**
 * Voucher type values used in the SevDesk API
 */
class VoucherType
{
    /** Normal voucher */
    public const VOUCHER = 'VOU';
    
    /** Supplier invoice (Rechnungseingang) */
    public const SUPPLIER_INVOICE = 'RV';
}