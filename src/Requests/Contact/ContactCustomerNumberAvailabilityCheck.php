<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * contactCustomerNumberAvailabilityCheck
 *
 * Checks if a given customer number is available or already used.
 */
class ContactCustomerNumberAvailabilityCheck extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Contact/Mapper/checkCustomerNumberAvailability";
	}


	/**
	 * @param null|string $customerNumber The customer number to be checked.
	 */
	public function __construct(
		protected ?string $customerNumber = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['customerNumber' => $this->customerNumber]);
	}
}
