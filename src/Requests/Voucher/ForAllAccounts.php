<?php

namespace Ameax\SevDeskApi\Requests\Voucher;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * forAllAccounts
 *
 * You can use this endpoint to help you decide which accounts you can use when creating a voucher
 */
class ForAllAccounts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ReceiptGuidance/forAllAccounts";
	}


	public function __construct()
	{
	}
}
