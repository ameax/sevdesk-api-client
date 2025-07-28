<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * jobDownloadInfo
 *
 * When the export job has finished you can call this endpoint to get the download url.
 */
class JobDownloadInfo extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ExportJob/jobDownloadInfo";
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
