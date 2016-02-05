<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController
{
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var EntityToDtoMapper
     */
    private $commentsMapper;

    public function __construct(
        ResponseFactory $responseFactory,
        CommentRepository $commentRepository,
        EntityToDtoMapper $commentsMapper
    ) {
        $this->responseFactory = $responseFactory;
        $this->commentRepository = $commentRepository;
        $this->commentsMapper = $commentsMapper;
    }

    public function listAction(int $postId): JsonResponse
    {
        $comments = $this->commentRepository->getCommentsByPostId($postId);
        $dtoComments = $this->commentsMapper->transformCollection($comments);

        return $this->responseFactory->makeResponse($dtoComments);
    }
}
