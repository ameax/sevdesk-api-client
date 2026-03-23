<?php

namespace Ameax\SevDeskApi\Requests\CheckAccountTransaction;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateCheckAccountTransaction
 *
 * Update a check account transaction
 */
class UpdateCheckAccountTransaction extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/CheckAccountTransaction/{$this->checkAccountTransactionId}";
	}


	/**
	 * @param int $checkAccountTransactionId ID of check account to update transaction
	 */
	public function __construct(
		protected int $checkAccountTransactionId,
	) {
	}
}
