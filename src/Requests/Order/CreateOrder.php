<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createOrder
 *
 * Creates an order to which positions can be added later.
 */
class CreateOrder extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/Order/Factory/saveOrder";
	}


	public function __construct()
	{
	}
}
