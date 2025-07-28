<?php

namespace Ameax\SevDeskApi\Requests\Invoice;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createInvoiceFromOrder
 *
 * Create an invoice from an order
 */
class CreateInvoiceFromOrder extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/Invoice/Factory/createInvoiceFromOrder";
	}


	public function __construct()
	{
	}
}
