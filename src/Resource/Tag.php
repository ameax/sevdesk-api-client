<?php

namespace Ameax\SevDeskApi\Resource;

use Ameax\SevDeskApi\Requests\Tag\CreateTag;
use Ameax\SevDeskApi\Requests\Tag\DeleteTag;
use Ameax\SevDeskApi\Requests\Tag\GetTagById;
use Ameax\SevDeskApi\Requests\Tag\GetTagRelations;
use Ameax\SevDeskApi\Requests\Tag\GetTags;
use Ameax\SevDeskApi\Requests\Tag\UpdateTag;
use Ameax\SevDeskApi\Resource;
use Saloon\Contracts\Response;

class Tag extends Resource
{
	/**
	 * @param float|int $id ID of the Tag
	 * @param string $name Name of the Tag
	 */
	public function getTags(float|int|null $id, ?string $name): Response
	{
		return $this->connector->send(new GetTags($id, $name));
	}


	/**
	 * @param int $tagId ID of tag to return
	 */
	public function getTagById(int $tagId): Response
	{
		return $this->connector->send(new GetTagById($tagId));
	}


	/**
	 * @param int $tagId ID of tag you want to update
	 */
	public function updateTag(int $tagId): Response
	{
		return $this->connector->send(new UpdateTag($tagId));
	}


	/**
	 * @param int $tagId Id of tag to delete
	 */
	public function deleteTag(int $tagId): Response
	{
		return $this->connector->send(new DeleteTag($tagId));
	}


	public function createTag(): Response
	{
		return $this->connector->send(new CreateTag());
	}


	public function getTagRelations(): Response
	{
		return $this->connector->send(new GetTagRelations());
	}
}
