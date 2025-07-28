<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\Part\CreatePart;
use Ameax\SevDeskApi\Requests\Part\GetPartById;
use Ameax\SevDeskApi\Requests\Part\GetParts;
use Ameax\SevDeskApi\Requests\Part\PartGetStock;
use Ameax\SevDeskApi\Requests\Part\UpdatePart;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class Part extends Resource
{
	/**
	 * @param string $partNumber Retrieve all parts with this part number
	 * @param string $name Retrieve all parts with this name
	 */
	public function getParts(?string $partNumber, ?string $name): Response
	{
		return $this->connector->send(new GetParts($partNumber, $name));
	}


	public function createPart(): Response
	{
		return $this->connector->send(new CreatePart());
	}


	/**
	 * @param int $partId ID of part to return
	 */
	public function getPartById(int $partId): Response
	{
		return $this->connector->send(new GetPartById($partId));
	}


	/**
	 * @param int $partId ID of part to update
	 */
	public function updatePart(int $partId): Response
	{
		return $this->connector->send(new UpdatePart($partId));
	}


	/**
	 * @param int $partId ID of part for which you want the current stock.
	 */
	public function partGetStock(int $partId): Response
	{
		return $this->connector->send(new PartGetStock($partId));
	}
}
