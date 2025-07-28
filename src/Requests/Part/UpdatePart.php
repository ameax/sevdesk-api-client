<?php

namespace Ameax\SevDeskApi\Requests\Part;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updatePart
 *
 * Update a part
 */
class UpdatePart extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/Part/{$this->partId}";
	}


	/**
	 * @param int $partId ID of part to update
	 */
	public function __construct(
		protected int $partId,
	) {
	}
}
