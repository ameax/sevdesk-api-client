<?php

namespace Ameax\SevDeskApi\Requests\CheckAccount;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateCheckAccount
 *
 * Update a check account
 */
class UpdateCheckAccount extends Request implements HasBody
{
	use HasJsonBody;

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
