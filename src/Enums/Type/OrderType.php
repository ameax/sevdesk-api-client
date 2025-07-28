<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Type;

/**
 * Order type values used in the SevDesk API
 */
class OrderType
{
    /** Quote/Offer (Angebot) */
    public const QUOTE = 'AN';
    
    /** Order/Contract (Auftrag) */
    public const ORDER = 'AB';
    
    /** Delivery note (Lieferschein) */
    public const DELIVERY_NOTE = 'LI';
}