<?php

namespace Ameax\SevDeskApi\Requests\CreditNote;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updatecreditNote
 *
 * Update a creditNote
 */
class UpdatecreditNote extends Request
{
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
