<?php

namespace AppBundle\Transformer\EntityToDto;

use AppBundle\Dto\Outgoing\Comment as CommentDto;
use AppBundle\Dto\Outgoing\CommentCollection;
use AppBundle\Dto\OutgoingDto;
use AppBundle\Dto\OutgoingDtoCollection;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Mention;
use AppBundle\Transformer\EntityToDtoTransformer;
use AppBundle\Entity\Entity;

class CommentEntityToDtoTransformer implements EntityToDtoTransformer
{
    public function transform(Entity $comment): OutgoingDto
    {
        /** @var Comment $comment */

        $mentions = $comment->getMentions()->map(function (Mention $mention) {
            return $mention->getUserId() . 'popraw mnie bo tu ma byc username';
        })->toArray();

        return new CommentDto(
            $comment->getId(),
            $comment->getPostId(),
            $comment->getCreatedAt()->format('Y-m-d H:i:s'),
            $comment->getContent(),
            $comment->getAuthor()->getUserId(),
            $comment->getAuthor()->getUsername(),
            $mentions,
            '/uploads/avatars/20a0df7e56e1b00eb531a79c7eaf30a46cafc257.jpg',
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
