<?php

namespace Ameax\SevDeskApi\Requests\VoucherPos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getVoucherPositions
 *
 * Retrieve all voucher positions depending on the filters defined in the query.
 */
class GetVoucherPositions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/VoucherPos";
	}


	/**
	 * @param null|int $voucherid Retrieve all vouchers positions belonging to this voucher. Must be provided with voucher[objectName]
	 * @param null|string $voucherobjectName Only required if voucher[id] was provided. 'Voucher' should be used as value.
	 */
	public function __construct(
		protected ?int $voucherid = null,
		protected ?string $voucherobjectName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['voucher[id]' => $this->voucherid, 'voucher[objectName]' => $this->voucherobjectName]);
	}
}
