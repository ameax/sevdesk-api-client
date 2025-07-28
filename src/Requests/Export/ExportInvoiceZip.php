<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * exportInvoiceZip
 *
 * Export all invoices as zip
 */
class ExportInvoiceZip extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Export/invoiceZip";
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
