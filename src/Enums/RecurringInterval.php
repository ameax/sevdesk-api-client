<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums;

/**
 * Recurring interval values used in the SevDesk API
 * Format: P[years]Y[months]M[weeks]W
 */
class RecurringInterval
{
    /** Weekly */
    public const WEEKLY = 'P0Y0M1W';
    
    /** Bi-weekly (every 2 weeks) */
    public const BIWEEKLY = 'P0Y0M2W';
    
    /** Monthly */
    public const MONTHLY = 'P0Y1M0W';
    
    /** Quarterly (every 3 months) */
    public const QUARTERLY = 'P0Y3M0W';
    
    /** Semi-annually (every 6 months) */
    public const SEMIANNUALLY = 'P0Y6M0W';
    
    /** Annually (yearly) */
    public const ANNUALLY = 'P1Y0M0W';
    
    /** Every 2 years */
    public const BIENNIALLY = 'P2Y0M0W';
    
    /** Every 3 years */
    public const TRIENNIALLY = 'P3Y0M0W';
    
    /** Every 4 years */
    public const QUADRENNIALLY = 'P4Y0M0W';
    
    /** Every 5 years */
    public const QUINQUENNIALLY = 'P5Y0M0W';
}