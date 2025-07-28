<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Status;

/**
 * Voucher status values used in the SevDesk API
 */
class VoucherStatus
{
    /** Draft status */
    public const DRAFT = 50;
    
    /** Open/unpaid status */
    public const OPEN = 100;
    
    /** Paid status */
    public const PAID = 1000;
}