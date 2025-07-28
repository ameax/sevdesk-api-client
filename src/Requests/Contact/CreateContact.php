<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createContact
 *
 * Creates a new contact.<br>
 *      For adding addresses and communication ways, you will need to use
 * the ContactAddress and CommunicationWay endpoints.
 */
class CreateContact extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/Contact";
	}


	public function __construct()
	{
	}
}
