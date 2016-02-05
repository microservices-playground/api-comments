<?php

namespace AppBundle\Mapper\EntityToDto;

use AppBundle\Dto\Dto\CommentDto;
use AppBundle\Dto\Dto;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Mention;
use AppBundle\Mapper\EntityToDtoMapper;
use AppBundle\Entity\Entity;
use AppBundle\Service\UploadPathResolver\UploadPathResolver;

class CommentMapper implements EntityToDtoMapper
{
    /**
     * @var UploadPathResolver
     */
    private $avatarUploadPathResolver;

    public function __construct(UploadPathResolver $avatarUploadPathResolver)
    {
        $this->avatarUploadPathResolver = $avatarUploadPathResolver;
    }

    public function transform(Entity $comment): Dto
    {
        /** @var Comment $comment */

        $mentions = $comment->getMentions()->map(function (Mention $mention) {
            return $mention->getUsername();
        })->toArray();

        $avatar = $this->avatarUploadPathResolver->getUploadPath($comment->getAuthor()->getAvatarFilename());

        $commentDto = new CommentDto();
        $commentDto->id = $comment->getId();
        $commentDto->postId = $comment->getPostId();
        $commentDto->createdAt = $comment->getCreatedAt()->format('Y-m-d H:i:s');
        $commentDto->content = $comment->getContent();
        $commentDto->userId = $comment->getAuthor()->getUserId();
        $commentDto->username = $comment->getAuthor()->getUsername();
        $commentDto->mentions = $mentions;
        $commentDto->avatar = $avatar;
        $commentDto->deletable = true;

        return $commentDto;
    }

    public function transformCollection(array $comments): array
    {
        /** @var Comment[] $comments */

        $commentsDto = [];

        foreach ($comments as $comment) {
            $commentsDto[] = $this->transform($comment);
        }

        return $commentsDto;
    }
}
