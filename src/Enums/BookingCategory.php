<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums;

/**
 * Booking category values used in the SevDesk API
 */
class BookingCategory
{
    /** Provision */
    public const PROVISION = 'PROVISION';
    
    /** Assigned royalty */
    public const ROYALTY_ASSIGNED = 'ROYALTY_ASSIGNED';
    
    /** Unassigned royalty */
    public const ROYALTY_UNASSIGNED = 'ROYALTY_UNASSIGNED';
    
    /** Underachievement */
    public const UNDERACHIEVEMENT = 'UNDERACHIEVEMENT';
    
    /** Accounting type */
    public const ACCOUNTING_TYPE = 'ACCOUNTING_TYPE';
}