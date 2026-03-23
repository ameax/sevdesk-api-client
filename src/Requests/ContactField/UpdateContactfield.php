<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateContactfield
 *
 * Update a contact field
 */
class UpdateContactfield extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomField/{$this->contactCustomFieldId}";
	}


	/**
	 * @param float|int $contactCustomFieldId id of the contact field
	 */
	public function __construct(
		protected float|int $contactCustomFieldId,
	) {
	}
}
