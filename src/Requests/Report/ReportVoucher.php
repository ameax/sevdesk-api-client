<?php

namespace Ameax\SevDeskApi\Requests\Report;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reportVoucher
 *
 * Export voucher list
 */
class ReportVoucher extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Report/voucherlist";
	}


	/**
	 * @param null|bool $download
	 * @param array $sevQuery
	 */
	public function __construct(
		protected ?bool $download = null,
		protected array $sevQuery,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['download' => $this->download, 'sevQuery' => $this->sevQuery]);
	}
}
