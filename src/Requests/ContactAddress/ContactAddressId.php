<?php

namespace Ameax\SevDeskApi\Requests\ContactAddress;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * contactAddressId
 *
 * Returns a single contact address
 */
class ContactAddressId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ContactAddress/{$this->contactAddressId}";
	}


	/**
	 * @param int $contactAddressId ID of contact address to return
	 */
	public function __construct(
		protected int $contactAddressId,
	) {
	}
}
