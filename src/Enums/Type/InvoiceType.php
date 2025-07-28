<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Type;

/**
 * Invoice type values used in the SevDesk API
 */
class InvoiceType
{
    /** Normal invoice (Rechnung) */
    public const INVOICE = 'RE';
    
    /** Recurring invoice (Wiederkehrende Rechnung) */
    public const RECURRING = 'WKR';
    
    /** Cancellation invoice (Stornorechnung) */
    public const CANCELLATION = 'SR';
    
    /** Reminder (Mahnung) */
    public const REMINDER = 'MA';
    
    /** Partial invoice (Teilrechnung) */
    public const PARTIAL = 'TR';
    
    /** Advance payment invoice (Abschlagsrechnung) */
    public const ADVANCE_PAYMENT = 'AR';
    
    /** Final invoice (Endrechnung) */
    public const FINAL = 'ER';
}