<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\Basics\BookkeepingSystemVersion;
use Ameax\SevDeskApi\Resource;
use Saloon\Http\Response;

class Basics extends Resource
{
	public function bookkeepingSystemVersion(): Response
	{
		return $this->connector->send(new BookkeepingSystemVersion());
	}
}
