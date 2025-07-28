<?php

namespace Ameax\SevDeskApi\Requests\Order;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getRelatedObjects
 *
 * Get related objects of a specified order
 */
class GetRelatedObjects extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Order/{$this->orderId}/getRelatedObjects";
	}


	/**
	 * @param int $orderId ID of order to return the positions
	 * @param null|bool $includeItself Define if the related objects include the order itself
	 * @param null|bool $sortByType Define if you want the related objects sorted by type
	 * @param null|array $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
	 */
	public function __construct(
		protected int $orderId,
		protected ?bool $includeItself = null,
		protected ?bool $sortByType = null,
		protected ?array $embed = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['includeItself' => $this->includeItself, 'sortByType' => $this->sortByType, 'embed' => $this->embed]);
	}
}
