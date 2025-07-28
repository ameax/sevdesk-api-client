<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\ContactField\CreateContactField;
use Ameax\SevDeskApi\Requests\ContactField\CreateContactFieldSetting;
use Ameax\SevDeskApi\Requests\ContactField\DeleteContactCustomFieldId;
use Ameax\SevDeskApi\Requests\ContactField\DeleteContactFieldSetting;
use Ameax\SevDeskApi\Requests\ContactField\GetContactFieldSettingById;
use Ameax\SevDeskApi\Requests\ContactField\GetContactFieldSettings;
use Ameax\SevDeskApi\Requests\ContactField\GetContactFields;
use Ameax\SevDeskApi\Requests\ContactField\GetContactFieldsById;
use Ameax\SevDeskApi\Requests\ContactField\GetPlaceholder;
use Ameax\SevDeskApi\Requests\ContactField\GetReferenceCount;
use Ameax\SevDeskApi\Requests\ContactField\UpdateContactFieldSetting;
use Ameax\SevDeskApi\Requests\ContactField\UpdateContactfield;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class ContactField extends Resource
{
	/**
	 * @param string $objectName Model name
	 * @param string $subObjectName Sub model name, required if you have "Email" at objectName
	 */
	public function getPlaceholder(string $objectName, ?string $subObjectName): Response
	{
		return $this->connector->send(new GetPlaceholder($objectName, $subObjectName));
	}


	public function getContactFields(): Response
	{
		return $this->connector->send(new GetContactFields());
	}


	public function createContactField(): Response
	{
		return $this->connector->send(new CreateContactField());
	}


	/**
	 * @param float|int $contactCustomFieldId id of the contact field
	 */
	public function getContactFieldsById(float|int $contactCustomFieldId): Response
	{
		return $this->connector->send(new GetContactFieldsById($contactCustomFieldId));
	}


	/**
	 * @param float|int $contactCustomFieldId id of the contact field
	 */
	public function updateContactfield(float|int $contactCustomFieldId): Response
	{
		return $this->connector->send(new UpdateContactfield($contactCustomFieldId));
	}


	/**
	 * @param int $contactCustomFieldId Id of contact field
	 */
	public function deleteContactCustomFieldId(int $contactCustomFieldId): Response
	{
		return $this->connector->send(new DeleteContactCustomFieldId($contactCustomFieldId));
	}


	public function getContactFieldSettings(): Response
	{
		return $this->connector->send(new GetContactFieldSettings());
	}


	public function createContactFieldSetting(): Response
	{
		return $this->connector->send(new CreateContactFieldSetting());
	}


	/**
	 * @param int $contactCustomFieldSettingId ID of contact field to return
	 */
	public function getContactFieldSettingById(int $contactCustomFieldSettingId): Response
	{
		return $this->connector->send(new GetContactFieldSettingById($contactCustomFieldSettingId));
	}


	/**
	 * @param int $contactCustomFieldSettingId ID of contact field setting you want to update
	 */
	public function updateContactFieldSetting(int $contactCustomFieldSettingId): Response
	{
		return $this->connector->send(new UpdateContactFieldSetting($contactCustomFieldSettingId));
	}


	/**
	 * @param int $contactCustomFieldSettingId Id of contact field to delete
	 */
	public function deleteContactFieldSetting(int $contactCustomFieldSettingId): Response
	{
		return $this->connector->send(new DeleteContactFieldSetting($contactCustomFieldSettingId));
	}


	/**
	 * @param int $contactCustomFieldSettingId ID of contact field you want to get the reference count
	 */
	public function getReferenceCount(int $contactCustomFieldSettingId): Response
	{
		return $this->connector->send(new GetReferenceCount($contactCustomFieldSettingId));
	}
}
