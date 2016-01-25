<?php

namespace AppBundle\Mapper\EntityToDto;

use AppBundle\Dto\Outgoing\Comment as CommentDto;
use AppBundle\Dto\Outgoing\CommentCollection;
use AppBundle\Dto\OutgoingDto;
use AppBundle\Dto\OutgoingDtoCollection;
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

    public function transform(Entity $comment): OutgoingDto
    {
        /** @var Comment $comment */

        $mentions = $comment->getMentions()->map(function (Mention $mention) {
            return $mention->getUsername();
        })->toArray();

        $avatar = $this->avatarUploadPathResolver->getUploadPath($comment->getAuthor()->getAvatarFilename());

        return new CommentDto(
            $comment->getId(),
            $comment->getPostId(),
            $comment->getCreatedAt()->format('Y-m-d H:i:s'),
            $comment->getContent(),
            $comment->getAuthor()->getUserId(),
            $comment->getAuthor()->getUsername(),
            $mentions,
            $avatar,
            true
        );
    }

    public function transformCollection(array $comments): OutgoingDtoCollection
    {
        /** @var Comment[] $comments */

        $commentsDto = [];

        foreach ($comments as $comment) {
            $commentsDto[] = $this->transform($comment);
        }

        return new CommentCollection($commentsDto);
    }
}
