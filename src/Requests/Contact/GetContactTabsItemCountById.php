<?php

namespace Ameax\SevDeskApi\Requests\Contact;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactTabsItemCountById
 *
 * Get number of all invoices, orders, etc. of a specified contact
 */
class GetContactTabsItemCountById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Contact/{$this->contactId}/getTabsItemCount";
	}


	/**
	 * @param int $contactId ID of contact to return
	 */
	public function __construct(
		protected int $contactId,
	) {
	}
}
