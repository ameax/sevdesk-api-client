<?php

namespace Ameax\SevDeskApi\Requests\Export;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * exportDatevCSV
 *
 * Start an export that generates booking data in the DATEV format (CSV)  Before you can perform the
 * DATEV export, you first have to set the "accountingYearBegin". To do this, use the endpoint <a
 * href='#tag/Export/operation/updateExportConfig'>updateExportConfig</a>.  After that you can use the
 * createDatevCsvZipExportJob endpoint to start the DATEV export which returns the export ID.  You have
 * to use the <a href='#tag/Export/operation/jobDownloadInfo'>jobDownloadInfo</a> endpoint to receive
 * the download url when the export is ready.  <h3>Export workflow</h2> To get the DATEV CSV zip file,
 * please implement the following workflow. <ol> <li>Set the accountingYearBegin (if not already set)
 * via <a href='#tag/Export/operation/updateExportConfig'>updateExportConfig</a></li> <li>Start the
 * export by using the createDatevCsvZipExportJob endpoint</li> <li>Request a progressHash with
 * endpoint <a href='#tag/Export/operation/generateDownloadHash'>generateDownloadHash</a>
 * (optional)</li> <li>Use the progressHash to receive export progress information with endpoint <a
 * href='#tag/Export/operation/getProgress'>getProgress</a> (optional)</li> <li>Use the <a
 * href='#tag/Export/operation/jobDownloadInfo'>jobDownloadInfo</a> endpoint to get the download url to
 * the zip file.</li> </ol>
 */
class ExportDatevCsv extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/Export/createDatevCsvZipExportJob";
	}


	/**
	 * @param int $startDate The start date of the export as timestamp
	 * @param int $endDate The end date of the export as timestamp
	 * @param string $scope Define what you want to include in the DATEV export. This parameter takes a string of 5 letters. Each stands for a model that should be included. Possible letters are: ‘E’ (Earnings), ‘X’ (Expenditure), ‘T’ (Transactions), ‘C’ (Cashregister), ‘D’ (Assets). By providing one of those letter you specify that it should be included in the DATEV export. Some combinations are: ‘EXTCD’, ‘EXTD’ …
	 * @param null|bool $exportByPaydate When this parameter is true, the export contains only paid documents where pay date is in the time range of startDate and endDate
	 * @param null|bool $includeEnshrined If set to false, the export excludes enshrined documents
	 * @param null|bool $enshrineDocuments Specify if you want to enshrine all models which were included in the export
	 * @param null|bool $includeDocumentImages Specify if you want to include the document images in the export
	 */
	public function __construct(
		protected int $startDate,
		protected int $endDate,
		protected string $scope,
		protected ?bool $exportByPaydate = null,
		protected ?bool $includeEnshrined = null,
		protected ?bool $enshrineDocuments = null,
		protected ?bool $includeDocumentImages = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
			'scope' => $this->scope,
			'exportByPaydate' => $this->exportByPaydate,
			'includeEnshrined' => $this->includeEnshrined,
			'enshrineDocuments' => $this->enshrineDocuments,
			'includeDocumentImages' => $this->includeDocumentImages,
		]);
	}
}
