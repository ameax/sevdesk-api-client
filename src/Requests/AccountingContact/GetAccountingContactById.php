<?php

namespace Ameax\SevDeskApi\Requests\AccountingContact;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getAccountingContactById
 *
 * Returns a single accounting contac
 */
class GetAccountingContactById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/AccountingContact/{$this->accountingContactId}";
	}


	/**
	 * @param int $accountingContactId ID of accounting contact to return
	 */
	public function __construct(
		protected int $accountingContactId,
	) {
	}
}
