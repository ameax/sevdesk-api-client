<?php

namespace Ameax\SevDeskApi\Requests\CreditNote;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * creditNoteGetPdf
 *
 * Retrieves the pdf document of a credit note with additional metadata.
 */
class CreditNoteGetPdf extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CreditNote/{$this->creditNoteId}/getPdf";
	}


	/**
	 * @param int $creditNoteId ID of credit note from which you want the pdf
	 * @param null|bool $download If u want to download the pdf of the credit note.
	 * @param null|bool $preventSendBy Defines if u want to send the credit note.
	 */
	public function __construct(
		protected int $creditNoteId,
		protected ?bool $download = null,
		protected ?bool $preventSendBy = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['download' => $this->download, 'preventSendBy' => $this->preventSendBy]);
	}
}
