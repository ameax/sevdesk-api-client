<?php

namespace Ameax\SevDeskApi\Requests\CreditNote;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCreditNotes
 *
 * There are a multitude of parameter which can be used to filter.
 */
class GetCreditNotes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CreditNote";
	}


	/**
	 * @param null|string $status Status of the CreditNote
	 * @param null|string $creditNoteNumber Retrieve all CreditNotes with this creditNote number
	 * @param null|int $startDate Retrieve all CreditNotes with a date equal or higher
	 * @param null|int $endDate Retrieve all CreditNotes with a date equal or lower
	 * @param null|int $contactid Retrieve all CreditNotes with this contact. Must be provided with contact[objectName]
	 * @param null|string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
	 */
	public function __construct(
		protected ?string $status = null,
		protected ?string $creditNoteNumber = null,
		protected ?int $startDate = null,
		protected ?int $endDate = null,
		protected ?int $contactid = null,
		protected ?string $contactobjectName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'status' => $this->status,
			'creditNoteNumber' => $this->creditNoteNumber,
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
			'contact[id]' => $this->contactid,
			'contact[objectName]' => $this->contactobjectName,
		]);
	}
}
