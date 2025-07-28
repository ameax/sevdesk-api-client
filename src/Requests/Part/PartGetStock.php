<?php

namespace Ameax\SevDeskApi\Requests\Part;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * partGetStock
 *
 * Returns the current stock amount of the given part.
 */
class PartGetStock extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Part/{$this->partId}/getStock";
	}


	/**
	 * @param int $partId ID of part for which you want the current stock.
	 */
	public function __construct(
		protected int $partId,
	) {
	}
}
