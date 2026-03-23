<?php

namespace Ameax\SevDeskApi\Requests\Layout;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateCreditNoteTemplate
 *
 * Update an existing of credit note template
 */
class UpdateCreditNoteTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/CreditNote/{$this->creditNoteId}/changeParameter";
	}


	/**
	 * @param int $creditNoteId ID of credit note to update
	 */
	public function __construct(
		protected int $creditNoteId,
	) {
	}
}
