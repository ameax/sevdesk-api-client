<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteOrder
 */
class DeleteOrder extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/Order/{$this->orderId}";
	}


	/**
	 * @param int $orderId Id of order resource to delete
	 */
	public function __construct(
		protected int $orderId,
	) {
	}
}
