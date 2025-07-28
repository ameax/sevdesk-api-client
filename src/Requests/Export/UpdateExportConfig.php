<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateExportConfig
 *
 * Update export config to export DATEV
 */
class UpdateExportConfig extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/SevClient/{$this->sevClientId}/updateExportConfig";
	}


	/**
	 * @param float|int $sevClientId id of sevClient
	 */
	public function __construct(
		protected float|int $sevClientId,
	) {
	}
}
