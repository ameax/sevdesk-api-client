<?php

namespace Ameax\SevDeskApi\Requests\Voucher;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getVoucherById
 *
 * Returns a single voucher
 */
class GetVoucherById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Voucher/{$this->voucherId}";
	}


	/**
	 * @param int $voucherId ID of voucher to return
	 */
	public function __construct(
		protected int $voucherId,
	) {
	}
}
