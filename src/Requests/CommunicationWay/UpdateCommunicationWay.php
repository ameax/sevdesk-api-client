<?php

namespace Ameax\SevDeskApi\Requests\CommunicationWay;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * UpdateCommunicationWay
 *
 * Update a communication way
 */
class UpdateCommunicationWay extends Request implements HasBody
{
	use HasJsonBody;

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
