<?php

namespace Ameax\SevDeskApi\Requests\ContactAddress;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactAddresses
 *
 * Retrieve all contact addresses
 */
class GetContactAddresses extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ContactAddress";
	}


	public function __construct()
	{
	}
}
