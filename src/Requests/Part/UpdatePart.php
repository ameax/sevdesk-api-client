<?php

namespace Ameax\SevDeskApi\Requests\Part;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updatePart
 *
 * Update a part
 */
class UpdatePart extends Request implements HasBody
{
	use HasJsonBody;

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
