<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteContactFieldSetting
 */
class DeleteContactFieldSetting extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomFieldSetting/{$this->contactCustomFieldSettingId}";
	}


	/**
	 * @param int $contactCustomFieldSettingId Id of contact field to delete
	 */
	public function __construct(
		protected int $contactCustomFieldSettingId,
	) {
	}
}
