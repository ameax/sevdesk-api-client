<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrders
 *
 * There are a multitude of parameter which can be used to filter. A few of them are attached but
 *
 * for a complete list please check out <a href='#tag/Order/How-to-filter-for-certain-orders'>this</a>
 * list
 */
class GetOrders extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Order";
	}


	/**
	 * @param null|int $status Status of the order
	 * @param null|string $orderNumber Retrieve all orders with this order number
	 * @param null|int $startDate Retrieve all orders with a date equal or higher
	 * @param null|int $endDate Retrieve all orders with a date equal or lower
	 * @param null|int $contactid Retrieve all orders with this contact. Must be provided with contact[objectName]
	 * @param null|string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
	 */
	public function __construct(
		protected ?int $status = null,
		protected ?string $orderNumber = null,
		protected ?int $startDate = null,
		protected ?int $endDate = null,
		protected ?int $contactid = null,
		protected ?string $contactobjectName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'status' => $this->status,
			'orderNumber' => $this->orderNumber,
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
			'contact[id]' => $this->contactid,
			'contact[objectName]' => $this->contactobjectName,
		]);
	}
}
