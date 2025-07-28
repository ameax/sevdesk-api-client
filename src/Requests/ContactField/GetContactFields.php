<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFields
 *
 * Retrieve all contact fields
 */
class GetContactFields extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ContactCustomField";
	}


	public function __construct()
	{
	}
}
