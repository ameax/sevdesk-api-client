<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteContact
 */
class DeleteContact extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/Contact/{$this->contactId}";
	}


	/**
	 * @param int $contactId Id of contact resource to delete
	 */
	public function __construct(
		protected int $contactId,
	) {
	}
}
