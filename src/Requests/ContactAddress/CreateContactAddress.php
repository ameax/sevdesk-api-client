<?php

namespace Ameax\SevDeskApi\Requests\ContactAddress;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createContactAddress
 *
 * Creates a new contact address.
 */
class CreateContactAddress extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/ContactAddress";
	}


	public function __construct()
	{
	}
}
