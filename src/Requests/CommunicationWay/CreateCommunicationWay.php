<?php

namespace Ameax\SevDeskApi\Requests\CommunicationWay;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createCommunicationWay
 *
 * Creates a new contact communication way.
 */
class CreateCommunicationWay extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/CommunicationWay";
	}


	public function __construct()
	{
	}
}
