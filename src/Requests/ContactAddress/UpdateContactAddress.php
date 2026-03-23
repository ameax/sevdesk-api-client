<?php

namespace Ameax\SevDeskApi\Requests\ContactAddress;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateContactAddress
 *
 * update a existing contact address.
 */
class UpdateContactAddress extends Request implements HasBody
{
	use HasJsonBody;

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
