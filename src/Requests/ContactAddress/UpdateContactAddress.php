<?php

namespace Ameax\SevDeskApi\Requests\ContactAddress;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateContactAddress
 *
 * update a existing contact address.
 */
class UpdateContactAddress extends Request
{
	protected Method $method = Method::PUT;


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
