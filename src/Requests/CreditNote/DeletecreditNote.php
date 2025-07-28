<?php

namespace Ameax\SevDeskApi\Requests\CreditNote;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deletecreditNote
 */
class DeletecreditNote extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/CreditNote/{$this->creditNoteId}";
	}


	/**
	 * @param int $creditNoteId Id of creditNote resource to delete
	 */
	public function __construct(
		protected int $creditNoteId,
	) {
	}
}
