<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * findContactsByCustomFieldValue
 *
 * Returns an array of contacts having a certain custom field value set.
 */
class FindContactsByCustomFieldValue extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Contact/Factory/findContactsByCustomFieldValue";
	}


	/**
	 * @param string $value The value to be checked.
	 * @param null|string $customFieldSettingid ID of ContactCustomFieldSetting for which the value has to be checked.
	 * @param null|string $customFieldSettingobjectName Object name. Only needed if you also defined the ID of a ContactCustomFieldSetting.
	 * @param string $customFieldName The ContactCustomFieldSetting name, if no ContactCustomFieldSetting is provided.
	 */
	public function __construct(
		protected string $value,
		protected ?string $customFieldSettingid = null,
		protected ?string $customFieldSettingobjectName = null,
		protected string $customFieldName,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'value' => $this->value,
			'customFieldSetting[id]' => $this->customFieldSettingid,
			'customFieldSetting[objectName]' => $this->customFieldSettingobjectName,
			'customFieldName' => $this->customFieldName,
		]);
	}
}
