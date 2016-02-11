<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Service\CrudOperations\CreateHandler;
use Foodlove\AppBundle\Service\Validator\ValidationHandler;
use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class CreateController
{
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ValidationHandler
     */
    private $validationHandler;

    /**
     * @var CreateHandler
     */
    private $createHandler;

    public function __construct(
        ResponseFactory $responseFactory,
        SerializerInterface $serializer,
        ValidationHandler $validationHandler,
        CreateHandler $createHandler
    ) {
        $this->responseFactory = $responseFactory;
        $this->serializer = $serializer;
        $this->validationHandler = $validationHandler;
        $this->createHandler = $createHandler;
    }

    public function createAction(Request $request, int $postId): Response
    {
        /** @var CommentDto $commentDto */
        $commentDto = $this->serializer->deserialize($request->getContent(), CommentDto::class, 'json', [
            'groups' => ['create']
        ]);
        $commentDto->postId = $postId;

        $this->validationHandler->handleValidation($commentDto);
        $commentDto = $this->createHandler->create($commentDto);

        return $this->responseFactory->makeResponse($commentDto, Response::HTTP_CREATED);
    }
}
