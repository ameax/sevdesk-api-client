<?php

namespace Ameax\SevDeskApi\Requests\CommunicationWay;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateCommunicationWay
 *
 * Update a communication way
 */
class UpdateCommunicationWay extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/CommunicationWay/{$this->communicationWayId}";
	}


	/**
	 * @param int $communicationWayId ID of CommunicationWay to update
	 */
	public function __construct(
		protected int $communicationWayId,
	) {
	}
}
