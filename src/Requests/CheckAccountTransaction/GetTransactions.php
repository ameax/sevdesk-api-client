<?php

namespace Ameax\SevDeskApi\Requests\CheckAccountTransaction;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTransactions
 *
 * Retrieve all transactions depending on the filters defined in the query.
 */
class GetTransactions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/CheckAccountTransaction";
	}


	/**
	 * @param null|int $checkAccountid Retrieve all transactions on this check account. Must be provided with checkAccount[objectName]
	 * @param null|string $checkAccountobjectName Only required if checkAccount[id] was provided. 'CheckAccount' should be used as value.
	 * @param null|bool $isBooked Only retrieve booked transactions
	 * @param null|string $paymtPurpose Only retrieve transactions with this payment purpose
	 * @param null|string $startDate Only retrieve transactions from this date on
	 * @param null|string $endDate Only retrieve transactions up to this date
	 * @param null|string $payeePayerName Only retrieve transactions with this payee / payer
	 * @param null|bool $onlyCredit Only retrieve credit transactions
	 * @param null|bool $onlyDebit Only retrieve debit transactions
	 */
	public function __construct(
		protected ?int $checkAccountid = null,
		protected ?string $checkAccountobjectName = null,
		protected ?bool $isBooked = null,
		protected ?string $paymtPurpose = null,
		protected ?string $startDate = null,
		protected ?string $endDate = null,
		protected ?string $payeePayerName = null,
		protected ?bool $onlyCredit = null,
		protected ?bool $onlyDebit = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'checkAccount[id]' => $this->checkAccountid,
			'checkAccount[objectName]' => $this->checkAccountobjectName,
			'isBooked' => $this->isBooked,
			'paymtPurpose' => $this->paymtPurpose,
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
			'payeePayerName' => $this->payeePayerName,
			'onlyCredit' => $this->onlyCredit,
			'onlyDebit' => $this->onlyDebit,
		]);
	}
}
