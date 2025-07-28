<?php

namespace Ameax\SevDeskApi\Requests\CheckAccount;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCheckAccounts
 *
 * Retrieve all check accounts
 */
class GetCheckAccounts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CheckAccount";
	}


	public function __construct()
	{
	}
}
