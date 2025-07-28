<?php

namespace Ameax\SevDeskApi\Requests\Tag;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateTag
 *
 * Update an existing tag
 */
class UpdateTag extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/Tag/{$this->tagId}";
	}


	/**
	 * @param int $tagId ID of tag you want to update
	 */
	public function __construct(
		protected int $tagId,
	) {
	}
}
