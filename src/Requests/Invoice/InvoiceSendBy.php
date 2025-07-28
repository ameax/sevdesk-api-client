<?php

namespace Ameax\SevDeskApi\Requests\Invoice;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * invoiceSendBy
 *
 * Marks an invoice as sent by a chosen send type.
 */
class InvoiceSendBy extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/Invoice/{$this->invoiceId}/sendBy";
	}


	/**
	 * @param int $invoiceId ID of invoice to mark as sent
	 */
	public function __construct(
		protected int $invoiceId,
	) {
	}
}
