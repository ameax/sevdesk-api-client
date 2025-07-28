<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Status;

/**
 * Credit note status values used in the SevDesk API
 */
class CreditNoteStatus
{
    /** Draft status */
    public const DRAFT = 100;
    
    /** Open status */
    public const OPEN = 200;
    
    /** Sent status */
    public const SENT = 300;
    
    /** Partially paid status */
    public const PARTIALLY_PAID = 500;
    
    /** Paid status */
    public const PAID = 750;
    
    /** Cancelled status */
    public const CANCELLED = 1000;
}