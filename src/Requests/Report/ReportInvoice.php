<?php

namespace Ameax\SevDeskApi\Requests\Report;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reportInvoice
 *
 * Export invoice list
 */
class ReportInvoice extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Report/invoicelist";
	}


	/**
	 * @param null|bool $download
	 * @param string $view
	 * @param array $sevQuery
	 */
	public function __construct(
		protected ?bool $download = null,
		protected string $view,
		protected array $sevQuery,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['download' => $this->download, 'view' => $this->view, 'sevQuery' => $this->sevQuery]);
	}
}
