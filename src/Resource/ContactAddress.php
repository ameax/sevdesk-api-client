<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\ContactAddress\ContactAddressId;
use Ameax\SevDeskApi\Requests\ContactAddress\CreateContactAddress;
use Ameax\SevDeskApi\Requests\ContactAddress\DeleteContactAddress;
use Ameax\SevDeskApi\Requests\ContactAddress\GetContactAddresses;
use Ameax\SevDeskApi\Requests\ContactAddress\UpdateContactAddress;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class ContactAddress extends Resource
{
	public function getContactAddresses(): Response
	{
		return $this->connector->send(new GetContactAddresses());
	}


	public function createContactAddress(): Response
	{
		return $this->connector->send(new CreateContactAddress());
	}


	/**
	 * @param int $contactAddressId ID of contact address to return
	 */
	public function contactAddressId(int $contactAddressId): Response
	{
		return $this->connector->send(new ContactAddressId($contactAddressId));
	}


	/**
	 * @param int $contactAddressId ID of contact address to return
	 */
	public function updateContactAddress(int $contactAddressId): Response
	{
		return $this->connector->send(new UpdateContactAddress($contactAddressId));
	}


	/**
	 * @param int $contactAddressId Id of contact address resource to delete
	 */
	public function deleteContactAddress(int $contactAddressId): Response
	{
		return $this->connector->send(new DeleteContactAddress($contactAddressId));
	}
}
