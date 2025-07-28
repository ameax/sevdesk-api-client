<?php

namespace Ameax\SevDeskApi\Requests\Part;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createPart
 *
 * Creates a part in your sevdesk inventory.
 */
class CreatePart extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/Part";
	}


	public function __construct()
	{
	}
}
