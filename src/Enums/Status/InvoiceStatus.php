<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Status;

/**
 * Invoice status values used in the SevDesk API
 */
class InvoiceStatus
{
    /** Draft status */
    public const DRAFT = 50;
    
    /** Open/created status */
    public const OPEN = 100;
    
    /** Sent status */
    public const SENT = 200;
    
    /** Partially paid status */
    public const PARTIAL = 750;
    
    /** Cancelled status */
    public const CANCELLED = 1000;
}