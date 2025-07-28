<?php

namespace Ameax\SevDeskApi\Requests\Report;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reportOrder
 *
 * Export order list
 */
class ReportOrder extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Report/orderlist";
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
