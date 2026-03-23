<?php

namespace Ameax\SevDeskApi\Requests\OrderPos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateOrderPosition
 *
 * Update an order position
 */
class UpdateOrderPosition extends Request implements HasBody
{
	use HasJsonBody;

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
