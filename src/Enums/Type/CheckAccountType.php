<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Type;

/**
 * Check account (bank account) type values used in the SevDesk API
 */
class CheckAccountType
{
    /** Online banking account */
    public const ONLINE = 'online';
    
    /** Offline/manual account */
    public const OFFLINE = 'offline';
    
    /** Cash register */
    public const REGISTER = 'register';
}