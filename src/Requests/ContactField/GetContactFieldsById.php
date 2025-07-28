<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFieldsById
 *
 * Retrieve all contact fields
 */
class GetContactFieldsById extends Request
{
	protected Method $method = Method::GET;


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
