<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateContact
 *
 * Update a contact
 */
class UpdateContact extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/Contact/{$this->contactId}";
	}


	/**
	 * @param int $contactId ID of contact to update
	 */
	public function __construct(
		protected int $contactId,
	) {
	}
}
