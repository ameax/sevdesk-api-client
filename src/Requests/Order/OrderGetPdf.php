<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orderGetPdf
 *
 * Retrieves the pdf document of an order with additional metadata and commit the order.
 */
class OrderGetPdf extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Order/{$this->orderId}/getPdf";
	}


	/**
	 * @param int $orderId ID of order from which you want the pdf
	 * @param null|bool $download If u want to download the pdf of the order.
	 * @param null|bool $preventSendBy Defines if u want to send the order.
	 */
	public function __construct(
		protected int $orderId,
		protected ?bool $download = null,
		protected ?bool $preventSendBy = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['download' => $this->download, 'preventSendBy' => $this->preventSendBy]);
	}
}
