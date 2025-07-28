<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\Report\ReportContact;
use Ameax\SevDeskApi\Requests\Report\ReportInvoice;
use Ameax\SevDeskApi\Requests\Report\ReportOrder;
use Ameax\SevDeskApi\Requests\Report\ReportVoucher;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class Report extends Resource
{
	/**
	 * @param bool $download
	 * @param string $view
	 * @param array $sevQuery
	 */
	public function reportInvoice(?bool $download, string $view, array $sevQuery): Response
	{
		return $this->connector->send(new ReportInvoice($download, $view, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param string $view
	 * @param array $sevQuery
	 */
	public function reportOrder(?bool $download, string $view, array $sevQuery): Response
	{
		return $this->connector->send(new ReportOrder($download, $view, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function reportContact(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ReportContact($download, $sevQuery));
	}


	/**
	 * @param bool $download
	 * @param array $sevQuery
	 */
	public function reportVoucher(?bool $download, array $sevQuery): Response
	{
		return $this->connector->send(new ReportVoucher($download, $sevQuery));
	}
}
