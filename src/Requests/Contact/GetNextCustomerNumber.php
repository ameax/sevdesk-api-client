<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getNextCustomerNumber
 *
 * Retrieves the next available customer number. Avoids duplicates.
 */
class GetNextCustomerNumber extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Contact/Factory/getNextCustomerNumber";
	}


	public function __construct()
	{
	}
}
