<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * sendorderViaEMail
 *
 * This endpoint sends the specified order to a customer via email.<br>
 *     This will automatically
 * mark the order as sent.<br>
 *     Please note, that in production an order is not allowed to be
 * changed after this happened!
 */
class SendorderViaEmail extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/Order/{$this->orderId}/sendViaEmail";
	}


	/**
	 * @param int $orderId ID of order to be sent via email
	 */
	public function __construct(
		protected int $orderId,
	) {
	}
}
