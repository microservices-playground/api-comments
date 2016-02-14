<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Service\CrudOperations\DeleteHandler;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

class RemoveController
{
    /**
     * @var DeleteHandler
     */
    private $deleteHandler;

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    public function __construct(DeleteHandler $deleteHandler, ResponseFactory $responseFactory)
    {
        $this->deleteHandler = $deleteHandler;
        $this->responseFactory = $responseFactory;
    }

    public function removeAction(int $commentId): Response
    {
        $this->deleteHandler->delete($commentId);

        return $this->responseFactory->makeResponse();
    }
}
