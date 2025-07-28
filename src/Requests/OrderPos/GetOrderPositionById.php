<?php

namespace Ameax\SevDeskApi\Requests\OrderPos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrderPositionById
 *
 * Returns a single order position
 */
class GetOrderPositionById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/OrderPos/{$this->orderPosId}";
	}


	/**
	 * @param int $orderPosId ID of order position to return
	 */
	public function __construct(
		protected int $orderPosId,
	) {
	}
}
