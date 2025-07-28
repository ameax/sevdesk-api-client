<?php

namespace Ameax\SevDeskApi\Requests\Tag;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTags
 *
 * Retrieve all tags
 */
class GetTags extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Tag";
	}


	/**
	 * @param null|float|int $id ID of the Tag
	 * @param null|string $name Name of the Tag
	 */
	public function __construct(
		protected float|int|null $id = null,
		protected ?string $name = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['id' => $this->id, 'name' => $this->name]);
	}
}
