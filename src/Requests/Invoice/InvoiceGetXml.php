<?php

namespace Ameax\SevDeskApi\Requests\Invoice;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * invoiceGetXml
 *
 * Retrieves the XML of an e-invoice
 */
class InvoiceGetXml extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Invoice/{$this->invoiceId}/getXml";
	}


	/**
	 * @param int $invoiceId ID of invoice from which you want the XML
	 */
	public function __construct(
		protected int $invoiceId,
	) {
	}
}
