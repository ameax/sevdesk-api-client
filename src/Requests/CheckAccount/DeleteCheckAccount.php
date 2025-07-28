<?php

namespace Ameax\SevDeskApi\Requests\CheckAccount;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteCheckAccount
 */
class DeleteCheckAccount extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/CheckAccount/{$this->checkAccountId}";
	}


	/**
	 * @param int $checkAccountId Id of check account to delete
	 */
	public function __construct(
		protected int $checkAccountId,
	) {
	}
}
