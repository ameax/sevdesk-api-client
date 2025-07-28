<?php

namespace Ameax\SevDeskApi\Requests\OrderPos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateOrderPosition
 *
 * Update an order position
 */
class UpdateOrderPosition extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/OrderPos/{$this->orderPosId}";
	}


	/**
	 * @param int $orderPosId ID of order position to update
	 */
	public function __construct(
		protected int $orderPosId,
	) {
	}
}
