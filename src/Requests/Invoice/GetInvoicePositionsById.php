<?php

namespace Ameax\SevDeskApi\Requests\Invoice;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getInvoicePositionsById
 *
 * Returns all positions of an invoice
 */
class GetInvoicePositionsById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Invoice/{$this->invoiceId}/getPositions";
	}


	/**
	 * @param int $invoiceId ID of invoice to return the positions
	 * @param null|int $limit limits the number of entries returned
	 * @param null|int $offset set the index where the returned entries start
	 * @param null|array $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
	 */
	public function __construct(
		protected int $invoiceId,
		protected ?int $limit = null,
		protected ?int $offset = null,
		protected ?array $embed = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['limit' => $this->limit, 'offset' => $this->offset, 'embed' => $this->embed]);
	}
}
