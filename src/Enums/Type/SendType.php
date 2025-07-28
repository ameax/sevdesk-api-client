<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Type;

/**
 * Send type values used in the SevDesk API for document delivery
 */
class SendType
{
    /** Print document */
    public const PRINT = 'VPR';
    
    /** Send by postal mail */
    public const POSTAL = 'VP';
    
    /** Send by email */
    public const EMAIL = 'VM';
    
    /** Download as PDF */
    public const PDF = 'VPDF';
}