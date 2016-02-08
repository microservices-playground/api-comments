<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Response;

class RemoveController
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function removeAction(int $postId, int $commentId): Response
    {
        $comment = $this->commentRepository->getById($commentId);

        if (null === $comment) {
            return new Response(null, Response::HTTP_NOT_FOUND);
        }

        $this->commentRepository->remove($comment);

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
