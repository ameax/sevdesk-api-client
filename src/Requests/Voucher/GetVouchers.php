<?php

namespace Ameax\SevDeskApi\Requests\Voucher;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getVouchers
 *
 * There are a multitude of parameter which can be used to filter. A few of them are attached but
 *
 * for a complete list please check out <a
 * href='#tag/Voucher/How-to-filter-for-certain-vouchers'>this</a> list
 */
class GetVouchers extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Voucher";
	}


	/**
	 * @param null|float|int $status Status of the vouchers to retrieve.
	 * @param null|string $creditDebit Define if you only want credit or debit vouchers.
	 * @param null|string $descriptionLike Retrieve all vouchers with a description like this.
	 * @param null|int $startDate Retrieve all vouchers with a date equal or higher
	 * @param null|int $endDate Retrieve all vouchers with a date equal or lower
	 * @param null|int $contactid Retrieve all vouchers with this contact. Must be provided with contact[objectName]
	 * @param null|string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
	 */
	public function __construct(
		protected float|int|null $status = null,
		protected ?string $creditDebit = null,
		protected ?string $descriptionLike = null,
		protected ?int $startDate = null,
		protected ?int $endDate = null,
		protected ?int $contactid = null,
		protected ?string $contactobjectName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'status' => $this->status,
			'creditDebit' => $this->creditDebit,
			'descriptionLike' => $this->descriptionLike,
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
			'contact[id]' => $this->contactid,
			'contact[objectName]' => $this->contactobjectName,
		]);
	}
}
