<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Exception\ValidationError;
use Foodlove\AppBundle\Service\Validator\ValidationHandler;
use Foodlove\AppBundle\Response\ValidationErrorResponse;
use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Repository\CommentRepository;
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
     * @var DtoToEntityMapper
     */
    private $dtoToEntityMapper;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var EntityToDtoMapper
     */
    private $entityToDtoMapper;

    /**
     * @var ValidationHandler
     */
    private $validationHandler;

    public function __construct(
        ResponseFactory $responseFactory,
        SerializerInterface $serializer,
        DtoToEntityMapper $dtoToEntityMapper,
        CommentRepository $commentRepository,
        EntityToDtoMapper $entityToDtoMapper,
        ValidationHandler $validationHandler
    ) {
        $this->responseFactory = $responseFactory;
        $this->serializer = $serializer;
        $this->dtoToEntityMapper = $dtoToEntityMapper;
        $this->commentRepository = $commentRepository;
        $this->entityToDtoMapper = $entityToDtoMapper;
        $this->validationHandler = $validationHandler;
    }

    public function createAction(Request $request, int $postId): Response
    {
        /** @var CommentDto $commentDto */
        $commentDto = $this->serializer->deserialize($request->getContent(), CommentDto::class, 'json', [
            'groups' => ['create']
        ]);
        $commentDto->postId = $postId;

        try {
            $this->validationHandler->handleValidation($commentDto);
        } catch (ValidationError $e) {
            return new ValidationErrorResponse($e);
        }

        $comment = $this->dtoToEntityMapper->transform($commentDto);
        $this->commentRepository->add($comment);
        $commentDto = $this->entityToDtoMapper->transform($comment);

        return $this->responseFactory->makeResponse($commentDto, Response::HTTP_CREATED);
    }
}
