<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\AccountingContact\CreateAccountingContact;
use Ameax\SevDeskApi\Requests\AccountingContact\DeleteAccountingContact;
use Ameax\SevDeskApi\Requests\AccountingContact\GetAccountingContact;
use Ameax\SevDeskApi\Requests\AccountingContact\GetAccountingContactById;
use Ameax\SevDeskApi\Requests\AccountingContact\UpdateAccountingContact;
use Ameax\SevDeskApi\Resource;
use Saloon\Http\Response;

class AccountingContact extends Resource
{
	/**
	 * @param string $contactid ID of contact for which you want the accounting contact.
	 * @param string $contactobjectName Object name. Only needed if you also defined the ID of a contact.
	 */
	public function getAccountingContact(?string $contactid, ?string $contactobjectName): Response
	{
		return $this->connector->send(new GetAccountingContact($contactid, $contactobjectName));
	}


	public function createAccountingContact(): Response
	{
		return $this->connector->send(new CreateAccountingContact());
	}


	/**
	 * @param int $accountingContactId ID of accounting contact to return
	 */
	public function getAccountingContactById(int $accountingContactId): Response
	{
		return $this->connector->send(new GetAccountingContactById($accountingContactId));
	}


	/**
	 * @param int $accountingContactId ID of accounting contact to update
	 */
	public function updateAccountingContact(int $accountingContactId): Response
	{
		return $this->connector->send(new UpdateAccountingContact($accountingContactId));
	}


	/**
	 * @param int $accountingContactId Id of accounting contact resource to delete
	 */
	public function deleteAccountingContact(int $accountingContactId): Response
	{
		return $this->connector->send(new DeleteAccountingContact($accountingContactId));
	}
}
