<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateOrder
 *
 * Update an order
 */
class UpdateOrder extends Request implements HasBody
{
	use HasJsonBody;

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
