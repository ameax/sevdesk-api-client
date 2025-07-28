<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums;

/**
 * Tax rule ID values used in the SevDesk API
 * These correspond to different tax scenarios in the German tax system
 */
class TaxRule
{
    /** Standard tax rate (19% in Germany) */
    public const STANDARD = 1;
    
    /** Reduced tax rate (7% in Germany) */
    public const REDUCED = 2;
    
    /** Tax-free export to EU */
    public const TAX_FREE_EU = 3;
    
    /** Tax-free export to non-EU */
    public const TAX_FREE_NON_EU = 4;
    
    /** Reverse charge procedure */
    public const REVERSE_CHARGE = 5;
    
    /** Small business regulation (Kleinunternehmer) */
    public const SMALL_BUSINESS = 11;
    
    /** Inner-community acquisition */
    public const INNER_COMMUNITY_ACQUISITION = 17;
    
    /** Tax-free according to §4 Nr. 8ff UStG */
    public const TAX_FREE_PARAGRAPH_4 = 18;
    
    /** Construction services according to §13b UStG */
    public const CONSTRUCTION_SERVICES = 19;
    
    /** Inner-community triangular transaction */
    public const TRIANGULAR_TRANSACTION = 20;
    
    /** Other services according to §13b UStG */
    public const OTHER_SERVICES = 21;
    
    /** 
     * Tax rule for credit notes
     * This appears to be used specifically for credit notes in SevDesk
     * Not documented in official API but found in practice
     */
    public const CREDIT_NOTE_STANDARD = 9;
}