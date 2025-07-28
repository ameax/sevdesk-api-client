<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\CreditNote\BookCreditNote;
use Ameax\SevDeskApi\Requests\CreditNote\CreateCreditNoteFromInvoice;
use Ameax\SevDeskApi\Requests\CreditNote\CreateCreditNoteFromVoucher;
use Ameax\SevDeskApi\Requests\CreditNote\CreatecreditNote;
use Ameax\SevDeskApi\Requests\CreditNote\CreditNoteEnshrine;
use Ameax\SevDeskApi\Requests\CreditNote\CreditNoteGetPdf;
use Ameax\SevDeskApi\Requests\CreditNote\CreditNoteResetToDraft;
use Ameax\SevDeskApi\Requests\CreditNote\CreditNoteResetToOpen;
use Ameax\SevDeskApi\Requests\CreditNote\CreditNoteSendBy;
use Ameax\SevDeskApi\Requests\CreditNote\DeletecreditNote;
use Ameax\SevDeskApi\Requests\CreditNote\GetCreditNotes;
use Ameax\SevDeskApi\Requests\CreditNote\GetcreditNoteById;
use Ameax\SevDeskApi\Requests\CreditNote\SendCreditNoteByPrinting;
use Ameax\SevDeskApi\Requests\CreditNote\SendCreditNoteViaEmail;
use Ameax\SevDeskApi\Requests\CreditNote\UpdatecreditNote;
use Ameax\SevDeskApi\Resource;
use Saloon\Http\Response;

class CreditNote extends Resource
{
	/**
	 * @param string $status Status of the CreditNote
	 * @param string $creditNoteNumber Retrieve all CreditNotes with this creditNote number
	 * @param int $startDate Retrieve all CreditNotes with a date equal or higher
	 * @param int $endDate Retrieve all CreditNotes with a date equal or lower
	 * @param int $contactid Retrieve all CreditNotes with this contact. Must be provided with contact[objectName]
	 * @param string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
	 */
	public function getCreditNotes(
		?string $status,
		?string $creditNoteNumber,
		?int $startDate,
		?int $endDate,
		?int $contactid,
		?string $contactobjectName,
	): Response
	{
		return $this->connector->send(new GetCreditNotes($status, $creditNoteNumber, $startDate, $endDate, $contactid, $contactobjectName));
	}


	public function createcreditNote(): Response
	{
		return $this->connector->send(new CreatecreditNote());
	}


	public function createCreditNoteFromInvoice(): Response
	{
		return $this->connector->send(new CreateCreditNoteFromInvoice());
	}


	public function createCreditNoteFromVoucher(): Response
	{
		return $this->connector->send(new CreateCreditNoteFromVoucher());
	}


	/**
	 * @param int $creditNoteId ID of creditNote to return
	 */
	public function getcreditNoteById(int $creditNoteId): Response
	{
		return $this->connector->send(new GetcreditNoteById($creditNoteId));
	}


	/**
	 * @param int $creditNoteId ID of creditNote to update
	 */
	public function updatecreditNote(int $creditNoteId): Response
	{
		return $this->connector->send(new UpdatecreditNote($creditNoteId));
	}


	/**
	 * @param int $creditNoteId Id of creditNote resource to delete
	 */
	public function deletecreditNote(int $creditNoteId): Response
	{
		return $this->connector->send(new DeletecreditNote($creditNoteId));
	}


	/**
	 * @param int $creditNoteId ID of creditNote to return
	 * @param string $sendType the type you want to print.
	 */
	public function sendCreditNoteByPrinting(int $creditNoteId, string $sendType): Response
	{
		return $this->connector->send(new SendCreditNoteByPrinting($creditNoteId, $sendType));
	}


	/**
	 * @param int $creditNoteId ID of credit note to mark as sent
	 */
	public function creditNoteSendBy(int $creditNoteId): Response
	{
		return $this->connector->send(new CreditNoteSendBy($creditNoteId));
	}


	/**
	 * @param int $creditNoteId ID of the credit note to enshrine
	 */
	public function creditNoteEnshrine(int $creditNoteId): Response
	{
		return $this->connector->send(new CreditNoteEnshrine($creditNoteId));
	}


	/**
	 * @param int $creditNoteId ID of credit note from which you want the pdf
	 * @param bool $download If u want to download the pdf of the credit note.
	 * @param bool $preventSendBy Defines if u want to send the credit note.
	 */
	public function creditNoteGetPdf(int $creditNoteId, ?bool $download, ?bool $preventSendBy): Response
	{
		return $this->connector->send(new CreditNoteGetPdf($creditNoteId, $download, $preventSendBy));
	}


	/**
	 * @param int $creditNoteId ID of credit note to be sent via email
	 */
	public function sendCreditNoteViaEmail(int $creditNoteId): Response
	{
		return $this->connector->send(new SendCreditNoteViaEmail($creditNoteId));
	}


	/**
	 * @param int $creditNoteId ID of credit note to book
	 */
	public function bookCreditNote(int $creditNoteId): Response
	{
		return $this->connector->send(new BookCreditNote($creditNoteId));
	}


	/**
	 * @param int $creditNoteId ID of the credit note to reset
	 */
	public function creditNoteResetToOpen(int $creditNoteId): Response
	{
		return $this->connector->send(new CreditNoteResetToOpen($creditNoteId));
	}


	/**
	 * @param int $creditNoteId ID of the credit note to reset
	 */
	public function creditNoteResetToDraft(int $creditNoteId): Response
	{
		return $this->connector->send(new CreditNoteResetToDraft($creditNoteId));
	}
}
