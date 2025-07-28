<?php

namespace Ameax\SevDeskApi\Requests\CommunicationWay;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCommunicationWayById
 *
 * Returns a single communication way
 */
class GetCommunicationWayById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CommunicationWay/{$this->communicationWayId}";
	}


	/**
	 * @param int $communicationWayId ID of communication way to return
	 */
	public function __construct(
		protected int $communicationWayId,
	) {
	}
}
