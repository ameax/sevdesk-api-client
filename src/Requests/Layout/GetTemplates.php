<?php

namespace Ameax\SevDeskApi\Requests\Layout;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTemplates
 *
 * Retrieve all templates
 */
class GetTemplates extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/DocServer/getTemplatesWithThumb";
	}


	/**
	 * @param null|string $type Type of the templates you want to get.
	 */
	public function __construct(
		protected ?string $type = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['type' => $this->type]);
	}
}
