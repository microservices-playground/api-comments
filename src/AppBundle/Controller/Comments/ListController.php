<?php

namespace AppBundle\Controller\Comments;

use AppBundle\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function listAction(int $postId): JsonResponse
    {
        $comments = $this->commentRepository->getCommentsByPostId($postId);

        return new JsonResponse($comments);
    }
}
