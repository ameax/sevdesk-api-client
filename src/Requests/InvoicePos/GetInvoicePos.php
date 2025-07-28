<?php

namespace Ameax\SevDeskApi\Requests\InvoicePos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getInvoicePos
 *
 * There are a multitude of parameter which can be used to filter.
 */
class GetInvoicePos extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/InvoicePos";
	}


	/**
	 * @param null|float|int $id Retrieve all InvoicePos with this InvoicePos id
	 * @param null|float|int $invoiceid Retrieve all invoices positions with this invoice. Must be provided with invoice[objectName]
	 * @param null|string $invoiceobjectName Only required if invoice[id] was provided. 'Invoice' should be used as value.
	 * @param null|float|int $partid Retrieve all invoices positions with this part. Must be provided with part[objectName]
	 * @param null|string $partobjectName Only required if part[id] was provided. 'Part' should be used as value.
	 */
	public function __construct(
		protected float|int|null $id = null,
		protected float|int|null $invoiceid = null,
		protected ?string $invoiceobjectName = null,
		protected float|int|null $partid = null,
		protected ?string $partobjectName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'id' => $this->id,
			'invoice[id]' => $this->invoiceid,
			'invoice[objectName]' => $this->invoiceobjectName,
			'part[id]' => $this->partid,
			'part[objectName]' => $this->partobjectName,
		]);
	}
}
