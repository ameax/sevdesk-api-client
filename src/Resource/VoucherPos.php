<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\VoucherPos\GetVoucherPositions;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class VoucherPos extends Resource
{
	/**
	 * @param int $voucherid Retrieve all vouchers positions belonging to this voucher. Must be provided with voucher[objectName]
	 * @param string $voucherobjectName Only required if voucher[id] was provided. 'Voucher' should be used as value.
	 */
	public function getVoucherPositions(?int $voucherid, ?string $voucherobjectName): Response
	{
		return $this->connector->send(new GetVoucherPositions($voucherid, $voucherobjectName));
	}
}
