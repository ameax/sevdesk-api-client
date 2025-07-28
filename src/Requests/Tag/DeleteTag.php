<?php

namespace Ameax\SevDeskApi\Requests\Tag;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteTag
 */
class DeleteTag extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/Tag/{$this->tagId}";
	}


	/**
	 * @param int $tagId Id of tag to delete
	 */
	public function __construct(
		protected int $tagId,
	) {
	}
}
