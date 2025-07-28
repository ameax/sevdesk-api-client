<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getReferenceCount
 *
 * Receive count reference
 */
class GetReferenceCount extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomFieldSetting/{$this->contactCustomFieldSettingId}/getReferenceCount";
	}


	/**
	 * @param int $contactCustomFieldSettingId ID of contact field you want to get the reference count
	 */
	public function __construct(
		protected int $contactCustomFieldSettingId,
	) {
	}
}
