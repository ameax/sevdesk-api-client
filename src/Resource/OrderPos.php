<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\OrderPos\DeleteOrderPos;
use Ameax\SevDeskApi\Requests\OrderPos\GetOrderPositionById;
use Ameax\SevDeskApi\Requests\OrderPos\GetOrderPositions;
use Ameax\SevDeskApi\Requests\OrderPos\UpdateOrderPosition;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class OrderPos extends Resource
{
	/**
	 * @param int $orderid Retrieve all order positions belonging to this order. Must be provided with voucher[objectName]
	 * @param string $orderobjectName Only required if order[id] was provided. 'Order' should be used as value.
	 */
	public function getOrderPositions(?int $orderid, ?string $orderobjectName): Response
	{
		return $this->connector->send(new GetOrderPositions($orderid, $orderobjectName));
	}


	/**
	 * @param int $orderPosId ID of order position to return
	 */
	public function getOrderPositionById(int $orderPosId): Response
	{
		return $this->connector->send(new GetOrderPositionById($orderPosId));
	}


	/**
	 * @param int $orderPosId ID of order position to update
	 */
	public function updateOrderPosition(int $orderPosId): Response
	{
		return $this->connector->send(new UpdateOrderPosition($orderPosId));
	}


	/**
	 * @param int $orderPosId Id of order position resource to delete
	 */
	public function deleteOrderPos(int $orderPosId): Response
	{
		return $this->connector->send(new DeleteOrderPos($orderPosId));
	}
}
