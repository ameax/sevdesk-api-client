<?php

namespace Ameax\SevDeskApi\Requests\CreditNote;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getcreditNoteById
 *
 * Returns a single creditNote
 */
class GetcreditNoteById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CreditNote/{$this->creditNoteId}";
	}


	/**
	 * @param int $creditNoteId ID of creditNote to return
	 */
	public function __construct(
		protected int $creditNoteId,
	) {
	}
}
