<?php

namespace Ameax\SevDeskApi\Requests\Part;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getPartById
 *
 * Returns a single part
 */
class GetPartById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Part/{$this->partId}";
	}


	/**
	 * @param int $partId ID of part to return
	 */
	public function __construct(
		protected int $partId,
	) {
	}
}
