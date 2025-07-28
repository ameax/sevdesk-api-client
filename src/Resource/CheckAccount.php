<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\CheckAccount\CreateClearingAccount;
use Ameax\SevDeskApi\Requests\CheckAccount\CreateFileImportAccount;
use Ameax\SevDeskApi\Requests\CheckAccount\DeleteCheckAccount;
use Ameax\SevDeskApi\Requests\CheckAccount\GetBalanceAtDate;
use Ameax\SevDeskApi\Requests\CheckAccount\GetCheckAccountById;
use Ameax\SevDeskApi\Requests\CheckAccount\GetCheckAccounts;
use Ameax\SevDeskApi\Requests\CheckAccount\UpdateCheckAccount;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class CheckAccount extends Resource
{
	public function getCheckAccounts(): Response
	{
		return $this->connector->send(new GetCheckAccounts());
	}


	public function createFileImportAccount(): Response
	{
		return $this->connector->send(new CreateFileImportAccount());
	}


	public function createClearingAccount(): Response
	{
		return $this->connector->send(new CreateClearingAccount());
	}


	/**
	 * @param int $checkAccountId ID of check account
	 */
	public function getCheckAccountById(int $checkAccountId): Response
	{
		return $this->connector->send(new GetCheckAccountById($checkAccountId));
	}


	/**
	 * @param int $checkAccountId ID of check account to update
	 */
	public function updateCheckAccount(int $checkAccountId): Response
	{
		return $this->connector->send(new UpdateCheckAccount($checkAccountId));
	}


	/**
	 * @param int $checkAccountId Id of check account to delete
	 */
	public function deleteCheckAccount(int $checkAccountId): Response
	{
		return $this->connector->send(new DeleteCheckAccount($checkAccountId));
	}


	/**
	 * @param int $checkAccountId ID of check account
	 * @param string $date Only consider transactions up to this date at 23:59:59
	 */
	public function getBalanceAtDate(int $checkAccountId, string $date): Response
	{
		return $this->connector->send(new GetBalanceAtDate($checkAccountId, $date));
	}
}
