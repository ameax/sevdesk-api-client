<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Status;

/**
 * Check account transaction status values used in the SevDesk API
 */
class CheckAccountTransactionStatus
{
    /** Created status */
    public const CREATED = 100;
    
    /** Linked status */
    public const LINKED = 200;
    
    /** Private status */
    public const PRIVATE = 300;
    
    /** Auto-booked status */
    public const AUTO_BOOKED = 350;
    
    /** Booked status */
    public const BOOKED = 400;
}