<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactById
 *
 * Returns a single contact
 */
class GetContactById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Contact/{$this->contactId}";
	}


	/**
	 * @param int $contactId ID of contact to return
	 */
	public function __construct(
		protected int $contactId,
	) {
	}
}
