<?php

namespace Ameax\SevDeskApi\Requests\Layout;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateOrderTemplate
 *
 * Update an existing order template
 */
class UpdateOrderTemplate extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/Order/{$this->orderId}/changeParameter";
	}


	/**
	 * @param int $orderId ID of order to update
	 */
	public function __construct(
		protected int $orderId,
	) {
	}
}
