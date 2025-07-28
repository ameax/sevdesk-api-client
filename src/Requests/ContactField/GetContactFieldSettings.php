<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFieldSettings
 *
 * Retrieve all contact field settings
 */
class GetContactFieldSettings extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomFieldSetting";
	}


	public function __construct()
	{
	}
}
