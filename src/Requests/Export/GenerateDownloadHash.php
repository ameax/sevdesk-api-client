<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * generateDownloadHash
 *
 * Generates an identifier to request the current export progress.
 */
class GenerateDownloadHash extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Progress/generateDownloadHash";
	}


	/**
	 * @param string $jobId The export job ID
	 */
	public function __construct(
		protected string $jobId,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['jobId' => $this->jobId]);
	}
}
