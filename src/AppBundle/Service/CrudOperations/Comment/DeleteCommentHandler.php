<?php

namespace Foodlove\AppBundle\Service\CrudOperations\Comment;

use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Service\CrudOperations\DeleteHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteCommentHandler implements DeleteHandler
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function delete(int $id)
    {
        $comment = $this->commentRepository->getById($id);

        if (null === $comment) {
            throw new NotFoundHttpException();
        }

        $this->commentRepository->remove($comment);
    }
}
