<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Service\CrudOperations\CreateHandler;
use Foodlove\AppBundle\Service\DtoFactory\DtoFactory;
use Foodlove\AppBundle\Service\Validator\ValidationHandler;
use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateController
{
    /**
     * @var DtoFactory
     */
    private $dtoFactory;

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var ValidationHandler
     */
    private $validationHandler;

    /**
     * @var CreateHandler
     */
    private $createHandler;

    public function __construct(
        DtoFactory $dtoFactory,
        ResponseFactory $responseFactory,
        ValidationHandler $validationHandler,
        CreateHandler $createHandler
    ) {
        $this->responseFactory = $responseFactory;
        $this->validationHandler = $validationHandler;
        $this->createHandler = $createHandler;
        $this->dtoFactory = $dtoFactory;
    }

    public function createAction(Request $request): Response
    {
        /** @var CommentDto $commentDto */
        $commentDto = $this->dtoFactory->makeDto($request);
        $this->validationHandler->handleValidation($commentDto);
        $commentDto = $this->createHandler->create($commentDto);

        return $this->responseFactory->makeResponse($commentDto, Response::HTTP_CREATED);
    }
}
