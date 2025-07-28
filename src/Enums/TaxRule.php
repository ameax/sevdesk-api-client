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
    
    /** 
     * Inner-community acquisitions (expense)
     * Innergemeinschaftliche Erwerbe
     * Allowed tax rates: 0.0, 7.0, 19.0
     */
    public const INNER_COMMUNITY_ACQUISITION_EXPENSE = 8;
    
    /** 
     * Tax rule for credit notes
     * This appears to be used specifically for credit notes in SevDesk
     * Not documented in official API but found in practice
     */
    public const CREDIT_NOTE_STANDARD = 9;
    
    /** 
     * Non-deductible expenses
     * Nicht vorsteuerabziehbare Aufwendungen
     * Allowed tax rates: 0.0
     * Also used for small business owners (Kleinunternehmer) expenses
     */
    public const NON_DEDUCTIBLE_EXPENSES = 10;
    
    /** Small business regulation (Kleinunternehmer) */
    public const SMALL_BUSINESS = 11;
    
    /** 
     * Reverse Charge with input tax deduction
     * Reverse Charge gem. §13b Abs. 2 UStG mit Vorsteuerabzug 0% (19%)
     * Allowed tax rates: 0.0
     */
    public const REVERSE_CHARGE_WITH_INPUT_TAX = 12;
    
    /** 
     * Reverse Charge without input tax deduction
     * Reverse Charge gem. §13b UStG ohne Vorsteuerabzug 0% (19%)
     * Allowed tax rates: 0.0
     * Also available for small business owners (Kleinunternehmer) expenses
     */
    public const REVERSE_CHARGE_WITHOUT_INPUT_TAX = 13;
    
    /** 
     * Reverse Charge for EU transactions
     * Reverse Charge gem. §13b Abs. 1 EU Umsätze 0% (19%)
     * Allowed tax rates: 0.0
     */
    public const REVERSE_CHARGE_EU = 14;
    
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
}