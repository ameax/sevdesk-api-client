<?php

namespace Ameax\SevDeskApi\Requests\Tag;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTagById
 *
 * Returns a single tag
 */
class GetTagById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Tag/{$this->tagId}";
	}


	/**
	 * @param int $tagId ID of tag to return
	 */
	public function __construct(
		protected int $tagId,
	) {
	}
}
