<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Type;

/**
 * Tax type values used in the SevDesk API
 */
class TaxType
{
    /** Default tax handling */
    public const DEFAULT = 'default';
    
    /** EU tax handling */
    public const EU = 'eu';
    
    /** Non-EU tax handling */
    public const NON_EU = 'noteu';
    
    /** Custom tax handling */
    public const CUSTOM = 'custom';
}