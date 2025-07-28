<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums\Type;

/**
 * Communication way type values used in the SevDesk API
 */
class CommunicationWayType
{
    /** Email communication */
    public const EMAIL = 'EMAIL';
    
    /** Phone communication */
    public const PHONE = 'PHONE';
    
    /** Web/Website communication */
    public const WEB = 'WEB';
    
    /** Mobile communication */
    public const MOBILE = 'MOBILE';
}