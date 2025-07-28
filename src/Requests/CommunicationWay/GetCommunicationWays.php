<?php

namespace Ameax\SevDeskApi\Requests\CommunicationWay;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCommunicationWays
 *
 * Returns all communication ways which have been added up until now. Filters can be added.
 */
class GetCommunicationWays extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CommunicationWay";
	}


	/**
	 * @param null|string $contactid ID of contact for which you want the communication ways.
	 * @param null|string $contactobjectName Object name. Only needed if you also defined the ID of a contact.
	 * @param null|string $type Type of the communication ways you want to get.
	 * @param null|string $main Define if you only want the main communication way.
	 */
	public function __construct(
		protected ?string $contactid = null,
		protected ?string $contactobjectName = null,
		protected ?string $type = null,
		protected ?string $main = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'contact[id]' => $this->contactid,
			'contact[objectName]' => $this->contactobjectName,
			'type' => $this->type,
			'main' => $this->main,
		]);
	}
}
