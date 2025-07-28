<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteContactCustomFieldId
 */
class DeleteContactCustomFieldId extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomField/{$this->contactCustomFieldId}";
	}


	/**
	 * @param int $contactCustomFieldId Id of contact field
	 */
	public function __construct(
		protected int $contactCustomFieldId,
	) {
	}
}
