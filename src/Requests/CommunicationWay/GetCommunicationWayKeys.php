<?php

namespace Ameax\SevDeskApi\Requests\CommunicationWay;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCommunicationWayKeys
 *
 * Returns all communication way keys.
 */
class GetCommunicationWayKeys extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CommunicationWayKey";
	}


	public function __construct()
	{
	}
}
