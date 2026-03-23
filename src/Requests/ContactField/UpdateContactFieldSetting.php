<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateContactFieldSetting
 *
 * Update an existing contact field  setting
 */
class UpdateContactFieldSetting extends Request implements HasBody
{
	use HasJsonBody;

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
