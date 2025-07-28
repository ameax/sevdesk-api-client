<?php

namespace Ameax\SevDeskApi\Requests\OrderPos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrderPositions
 *
 * Retrieve all order positions depending on the filters defined in the query.
 */
class GetOrderPositions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/OrderPos";
	}


	/**
	 * @param null|int $orderid Retrieve all order positions belonging to this order. Must be provided with voucher[objectName]
	 * @param null|string $orderobjectName Only required if order[id] was provided. 'Order' should be used as value.
	 */
	public function __construct(
		protected ?int $orderid = null,
		protected ?string $orderobjectName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['order[id]' => $this->orderid, 'order[objectName]' => $this->orderobjectName]);
	}
}
