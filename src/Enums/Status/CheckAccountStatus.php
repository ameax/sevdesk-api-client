<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Status;

/**
 * Check account (bank account) status values used in the SevDesk API
 */
class CheckAccountStatus
{
    /** Archived/inactive status */
    public const ARCHIVED = 0;
    
    /** Active status */
    public const ACTIVE = 100;
}