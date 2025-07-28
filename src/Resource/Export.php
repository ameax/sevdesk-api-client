<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\Export\ExportContact;
use Ameax\SevDeskApi\Requests\Export\ExportCreditNote;
use Ameax\SevDeskApi\Requests\Export\ExportDatevCsv;
use Ameax\SevDeskApi\Requests\Export\ExportDatevDepricated;
use Ameax\SevDeskApi\Requests\Export\ExportDatevXml;
use Ameax\SevDeskApi\Requests\Export\ExportInvoice;
use Ameax\SevDeskApi\Requests\Export\ExportInvoiceZip;
use Ameax\SevDeskApi\Requests\Export\ExportTransactions;
use Ameax\SevDeskApi\Requests\Export\ExportVoucher;
use Ameax\SevDeskApi\Requests\Export\ExportVoucherZip;
use Ameax\SevDeskApi\Requests\Export\GenerateDownloadHash;
use Ameax\SevDeskApi\Requests\Export\GetProgress;
use Ameax\SevDeskApi\Requests\Export\JobDownloadInfo;
use Ameax\SevDeskApi\Requests\Export\UpdateExportConfig;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class Export extends Resource
{
	/**
	 * @param float|int $sevClientId id of sevClient
	 */
	public function updateExportConfig(float|int $sevClientId): Response
	{
		return $this->connector->send(new UpdateExportConfig($sevClientId));
	}


	/**
	 * @param bool $download Specifies if the document is downloaded
	 * @param int $startDate The start date of the export as timestamp
	 * @param int $endDate The end date of the export as timestamp
	 * @param string $scope Define what you want to include in the DATEV export. This parameter takes a string of 5 letters. Each stands for a model that should be included. Possible letters are: ‘E’ (Earnings), ‘X’ (Expenditure), ‘T’ (Transactions), ‘C’ (Cashregister), ‘D’ (Assets). By providing one of those letter you specify that it should be included in the DATEV export. Some combinations are: ‘EXTCD’, ‘EXTD’ …
	 * @param bool $withUnpaidDocuments include unpaid documents
	 * @param bool $withEnshrinedDocuments include enshrined documents
	 * @param bool $enshrine Specify if you want to enshrine all models which were included in the export
	 */
	public function exportDatevDepricated(
		?bool $download,
		int $startDate,
		int $endDate,
		string $scope,
		?bool $withUnpaidDocuments,
		?bool $withEnshrinedDocuments,
		?bool $enshrine,
	): Response
	{
		return $this->connector->send(new ExportDatevDepricated($download, $startDate, $endDate, $scope, $withUnpaidDocuments, $withEnshrinedDocuments, $enshrine));
	}


	/**
	 * @param int $startDate The start date of the export as timestamp
	 * @param int $endDate The end date of the export as timestamp
	 * @param string $scope Define what you want to include in the DATEV export. This parameter takes a string of 5 letters. Each stands for a model that should be included. Possible letters are: ‘E’ (Earnings), ‘X’ (Expenditure), ‘T’ (Transactions), ‘C’ (Cashregister), ‘D’ (Assets). By providing one of those letter you specify that it should be included in the DATEV export. Some combinations are: ‘EXTCD’, ‘EXTD’ …
	 * @param bool $exportByPaydate When this parameter is true, the export contains only paid documents where pay date is in the time range of startDate and endDate
	 * @param bool $includeEnshrined If set to false, the export excludes enshrined documents
	 * @param bool $enshrineDocuments Specify if you want to enshrine all models which were included in the export
	 * @param bool $includeDocumentImages Specify if you want to include the document images in the export
	 */
	public function exportDatevCsv(
		int $startDate,
		int $endDate,
		string $scope,
		?bool $exportByPaydate,
		?bool $includeEnshrined,
		?bool $enshrineDocuments,
		?bool $includeDocumentImages,
	): Response
	{
		return $this->connector->send(new ExportDatevCsv($startDate, $endDate, $scope, $exportByPaydate, $includeEnshrined, $enshrineDocuments, $includeDocumentImages));
	}


	/**
	 * @param int $startDate The start date of the export as ISO timestamp
	 * @param int $endDate The end date of the export as ISO timestamp
	 * @param string $scope Define what you want to include in the DATEV export. This parameter takes a string of letters. Each letter stands for a document type that should be included. Possible letters are: ‘E’ (Receipts, outgoing invoices & credit notes) and ‘X’ (Expenditure documents).
	 * @param bool $exportByPaydate When this parameter is true, the export contains only paid documents where pay date is in the time range of startDate and endDate
	 * @param bool $includeEnshrined If set to false, the export excludes enshrined documents
	 * @param bool $includeExportedDocuments If set to false, the export excludes already exported documents
	 * @param bool $includeDocumentXml If set to false, the export excludes XML files containing the data for each document
	 */
	public function exportDatevXml(
		int $startDate,
		int $endDate,
		string $scope,
		?bool $exportByPaydate,
		?bool $includeEnshrined,
		?bool $includeExportedDocuments,
		?bool $includeDocumentXml,
	): Response
	{
		return $this->connector->send(new ExportDatevXml($startDate, $endDate, $scope, $exportByPaydate, $includeEnshrined, $includeExportedDocuments, $includeDocumentXml));
	}


	/**
	 * @param string $jobId The export job ID
	 */
	public function generateDownloadHash(string $jobId): Response
	{
		return $this->connector->send(new GenerateDownloadHash($jobId));
	}


	/**
	 * @param string $hash The hash string of an export
	 */
	public function getProgress(string $hash): Response
	{
		return $this->connector->send(new GetProgress($hash));
	}


	/**
	 * @param string $jobId The export job ID
	 */
	public function jobDownloadInfo(string $jobId): Response
	{
		return $this->connector->send(new JobDownloadInfo($jobId));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function exportInvoice(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ExportInvoice($download, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function exportInvoiceZip(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ExportInvoiceZip($download, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function exportCreditNote(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ExportCreditNote($download, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function exportVoucher(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ExportVoucher($download, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function exportTransactions(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ExportTransactions($download, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function exportVoucherZip(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ExportVoucherZip($download, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function exportContact(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ExportContact($download, $sevQuery));
	}
}
