<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getProgress
 *
 * Get the progress state of the export. You can use polling (request every few seconds) to get the
 * current state.
 */
class GetProgress extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Progress/getProgress";
	}


	/**
	 * @param string $hash The hash string of an export
	 */
	public function __construct(
		protected string $hash,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['hash' => $this->hash]);
	}
}
