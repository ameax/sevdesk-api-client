<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFieldSettingById
 *
 * Returns a single contact field setting
 */
class GetContactFieldSettingById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomFieldSetting/{$this->contactCustomFieldSettingId}";
	}


	/**
	 * @param int $contactCustomFieldSettingId ID of contact field to return
	 */
	public function __construct(
		protected int $contactCustomFieldSettingId,
	) {
	}
}
