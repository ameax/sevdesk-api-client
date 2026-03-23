<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateExportConfig
 *
 * Update export config to export DATEV
 */
class UpdateExportConfig extends Request implements HasBody
{
	use HasJsonBody;

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
