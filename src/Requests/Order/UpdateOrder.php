<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateOrder
 *
 * Update an order
 */
class UpdateOrder extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/Order/{$this->orderId}";
	}


	/**
	 * @param int $orderId ID of order to update
	 */
	public function __construct(
		protected int $orderId,
	) {
	}
}
