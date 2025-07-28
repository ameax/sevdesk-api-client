<?php

namespace Ameax\SevDeskApi\Requests\CheckAccountTransaction;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteCheckAccountTransaction
 */
class DeleteCheckAccountTransaction extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/CheckAccountTransaction/{$this->checkAccountTransactionId}";
	}


	/**
	 * @param int $checkAccountTransactionId Id of check account transaction to delete
	 */
	public function __construct(
		protected int $checkAccountTransactionId,
	) {
	}
}
