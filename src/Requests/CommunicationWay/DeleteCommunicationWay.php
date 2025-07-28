<?php

namespace Ameax\SevDeskApi\Requests\CommunicationWay;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteCommunicationWay
 */
class DeleteCommunicationWay extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/CommunicationWay/{$this->communicationWayId}";
	}


	/**
	 * @param int $communicationWayId Id of communication way resource to delete
	 */
	public function __construct(
		protected int $communicationWayId,
	) {
	}
}
