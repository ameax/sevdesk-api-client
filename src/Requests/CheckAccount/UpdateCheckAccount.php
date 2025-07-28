<?php

namespace Ameax\SevDeskApi\Requests\CheckAccount;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateCheckAccount
 *
 * Update a check account
 */
class UpdateCheckAccount extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/CheckAccount/{$this->checkAccountId}";
	}


	/**
	 * @param int $checkAccountId ID of check account to update
	 */
	public function __construct(
		protected int $checkAccountId,
	) {
	}
}
