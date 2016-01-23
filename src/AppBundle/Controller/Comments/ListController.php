<?php

namespace AppBundle\Controller\Comments;

use AppBundle\Repository\CommentRepository;
use AppBundle\Transformer\EntityToDtoTransformer;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var EntityToDtoTransformer
     */
    private $commentsTransformer;

    public function __construct(CommentRepository $commentRepository, EntityToDtoTransformer $commentsTransformer)
    {
        $this->commentRepository = $commentRepository;
        $this->commentsTransformer = $commentsTransformer;
    }

    public function listAction(int $postId): JsonResponse
    {
        $comments = $this->commentRepository->getCommentsByPostId($postId);
        $dtoComments = $this->commentsTransformer->transformCollection($comments);

        return new JsonResponse($dtoComments);
    }
}
