<?php

namespace Ameax\SevDeskApi\Requests\ContactField;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getPlaceholder
 *
 * Retrieve all Placeholders
 */
class GetPlaceholder extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Textparser/fetchDictionaryEntriesByType";
	}


	/**
	 * @param string $objectName Model name
	 * @param null|string $subObjectName Sub model name, required if you have "Email" at objectName
	 */
	public function __construct(
		protected string $objectName,
		protected ?string $subObjectName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['objectName' => $this->objectName, 'subObjectName' => $this->subObjectName]);
	}
}
