<?php

namespace Ameax\SevDeskApi\Requests\Part;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getParts
 *
 * Retrieve all parts in your sevdesk inventory according to the applied filters.
 */
class GetParts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Part";
	}


	/**
	 * @param null|string $partNumber Retrieve all parts with this part number
	 * @param null|string $name Retrieve all parts with this name
	 */
	public function __construct(
		protected ?string $partNumber = null,
		protected ?string $name = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['partNumber' => $this->partNumber, 'name' => $this->name]);
	}
}
