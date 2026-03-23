<?php

namespace Ameax\SevDeskApi\Requests\CreditNote;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updatecreditNote
 *
 * Update a creditNote
 */
class UpdatecreditNote extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/CreditNote/{$this->creditNoteId}";
	}


	/**
	 * @param int $creditNoteId ID of creditNote to update
	 */
	public function __construct(
		protected int $creditNoteId,
	) {
	}
}
