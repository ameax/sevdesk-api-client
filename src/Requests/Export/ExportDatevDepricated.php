<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * exportDatevDepricated
 *
 * DATEV export as zip with CSVs. Before you can perform the DATEV export, you must first set the
 * "accountingYearBegin". To do this, you must use the <a
 * href='#tag/Export/operation/updateExportConfig'>updateExportConfig</a> endpoint. Please note, that
 * this endpoint is deprecated. You should use the endpoint <a
 * href='#tag/Export/operation/exportDatevCSV'>/Export/createDatevCsvZipExportJob</a>.
 */
class ExportDatevDepricated extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Export/datevCSV";
	}


	/**
	 * @param null|bool $download Specifies if the document is downloaded
	 * @param int $startDate The start date of the export as timestamp
	 * @param int $endDate The end date of the export as timestamp
	 * @param string $scope Define what you want to include in the DATEV export. This parameter takes a string of 5 letters. Each stands for a model that should be included. Possible letters are: ‘E’ (Earnings), ‘X’ (Expenditure), ‘T’ (Transactions), ‘C’ (Cashregister), ‘D’ (Assets). By providing one of those letter you specify that it should be included in the DATEV export. Some combinations are: ‘EXTCD’, ‘EXTD’ …
	 * @param null|bool $withUnpaidDocuments include unpaid documents
	 * @param null|bool $withEnshrinedDocuments include enshrined documents
	 * @param null|bool $enshrine Specify if you want to enshrine all models which were included in the export
	 */
	public function __construct(
		protected ?bool $download = null,
		protected int $startDate,
		protected int $endDate,
		protected string $scope,
		protected ?bool $withUnpaidDocuments = null,
		protected ?bool $withEnshrinedDocuments = null,
		protected ?bool $enshrine = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'Download' => $this->download,
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
			'scope' => $this->scope,
			'withUnpaidDocuments' => $this->withUnpaidDocuments,
			'withEnshrinedDocuments' => $this->withEnshrinedDocuments,
			'enshrine' => $this->enshrine,
		]);
	}
}
