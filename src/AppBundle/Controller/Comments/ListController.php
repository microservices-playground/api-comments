<?php

namespace AppBundle\Controller\Comments;

use AppBundle\Repository\CommentRepository;
use AppBundle\Mapper\EntityToDtoMapper;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var EntityToDtoMapper
     */
    private $commentsMapper;

    public function __construct(CommentRepository $commentRepository, EntityToDtoMapper $commentsMapper)
    {
        $this->commentRepository = $commentRepository;
        $this->commentsMapper = $commentsMapper;
    }

    public function listAction(int $postId): JsonResponse
    {
        $comments = $this->commentRepository->getCommentsByPostId($postId);
        $dtoComments = $this->commentsMapper->transformCollection($comments);

        return new JsonResponse($dtoComments);
    }
}
