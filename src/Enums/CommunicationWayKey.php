<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums;

/**
 * Communication way key values used in the SevDesk API
 * These are used to categorize different contact methods
 */
class CommunicationWayKey
{
    /** Work/office contact */
    public const WORK = 'Arbeit';
    
    /** Autobox/answering machine */
    public const AUTOBOX = 'Autobox';
    
    /** Fax number */
    public const FAX = 'Fax';
    
    /** Mobile number */
    public const MOBILE = 'Mobil';
    
    /** Newsletter contact */
    public const NEWSLETTER = 'Newsletter';
    
    /** Private/personal contact */
    public const PRIVATE = 'Privat';
    
    /** Invoice address */
    public const INVOICE_ADDRESS = 'Rechnungsadresse';
    
    /** General/other (space character) */
    public const GENERAL = ' ';
}