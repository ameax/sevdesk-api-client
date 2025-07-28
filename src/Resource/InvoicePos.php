<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\InvoicePos\GetInvoicePos;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class InvoicePos extends Resource
{
	/**
	 * @param float|int $id Retrieve all InvoicePos with this InvoicePos id
	 * @param float|int $invoiceid Retrieve all invoices positions with this invoice. Must be provided with invoice[objectName]
	 * @param string $invoiceobjectName Only required if invoice[id] was provided. 'Invoice' should be used as value.
	 * @param float|int $partid Retrieve all invoices positions with this part. Must be provided with part[objectName]
	 * @param string $partobjectName Only required if part[id] was provided. 'Part' should be used as value.
	 */
	public function getInvoicePos(
		float|int|null $id,
		float|int|null $invoiceid,
		?string $invoiceobjectName,
		float|int|null $partid,
		?string $partobjectName,
	): Response
	{
		return $this->connector->send(new GetInvoicePos($id, $invoiceid, $invoiceobjectName, $partid, $partobjectName));
	}
}
