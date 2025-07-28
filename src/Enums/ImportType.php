<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums;

/**
 * Import type values used in the SevDesk API
 */
class ImportType
{
    /** CSV import format */
    public const CSV = 'CSV';
    
    /** MT940 bank statement format */
    public const MT940 = 'MT940';
}