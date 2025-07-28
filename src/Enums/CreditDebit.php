<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums;

/**
 * Credit/Debit indicator values used in the SevDesk API
 */
class CreditDebit
{
    /** Credit (positive amount) */
    public const CREDIT = 'C';
    
    /** Debit (negative amount) */
    public const DEBIT = 'D';
}