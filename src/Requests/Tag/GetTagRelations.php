<?php

namespace Ameax\SevDeskApi\Requests\Tag;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTagRelations
 *
 * Retrieve all tag relations
 */
class GetTagRelations extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/TagRelation";
	}


	public function __construct()
	{
	}
}
