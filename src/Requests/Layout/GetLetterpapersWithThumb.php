<?php

namespace Ameax\SevDeskApi\Requests\Layout;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getLetterpapersWithThumb
 *
 * Retrieve all letterpapers with Thumb
 */
class GetLetterpapersWithThumb extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/DocServer/getLetterpapersWithThumb";
	}


	public function __construct()
	{
	}
}
