<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Status;

/**
 * Order status values used in the SevDesk API
 */
class OrderStatus
{
    /** Draft status */
    public const DRAFT = 100;
    
    /** Sent status */
    public const SENT = 200;
    
    /** Accepted status */
    public const ACCEPTED = 300;
    
    /** Partially delivered status */
    public const PARTIALLY_DELIVERED = 500;
    
    /** Delivered status */
    public const DELIVERED = 750;
    
    /** Cancelled status */
    public const CANCELLED = 1000;
}