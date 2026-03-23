<?php

namespace Ameax\SevDeskApi\Requests\Layout;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateInvoiceTemplate
 *
 * Update an existing invoice template
 */
class UpdateInvoiceTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/Invoice/{$this->invoiceId}/changeParameter";
	}


	/**
	 * @param int $invoiceId ID of invoice to update
	 */
	public function __construct(
		protected int $invoiceId,
	) {
	}
}
