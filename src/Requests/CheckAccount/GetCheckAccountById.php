<?php

namespace Ameax\SevDeskApi\Requests\CheckAccount;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCheckAccountById
 *
 * Retrieve an existing check account
 */
class GetCheckAccountById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CheckAccount/{$this->checkAccountId}";
	}


	/**
	 * @param int $checkAccountId ID of check account
	 */
	public function __construct(
		protected int $checkAccountId,
	) {
	}
}
