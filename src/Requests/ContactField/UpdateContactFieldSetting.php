<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateContactFieldSetting
 *
 * Update an existing contact field  setting
 */
class UpdateContactFieldSetting extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomFieldSetting/{$this->contactCustomFieldSettingId}";
	}


	/**
	 * @param int $contactCustomFieldSettingId ID of contact field setting you want to update
	 */
	public function __construct(
		protected int $contactCustomFieldSettingId,
	) {
	}
}
