<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
     * @var ValidatorInterface
     */
    private $validator;

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

    public function __construct(
        ResponseFactory $responseFactory,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        DtoToEntityMapper $dtoToEntityMapper,
        CommentRepository $commentRepository,
        EntityToDtoMapper $entityToDtoMapper
    ) {
        $this->responseFactory = $responseFactory;
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->dtoToEntityMapper = $dtoToEntityMapper;
        $this->commentRepository = $commentRepository;
        $this->entityToDtoMapper = $entityToDtoMapper;
    }

    public function createAction(Request $request, int $postId): Response
    {
        /** @var CommentDto $commentDto */
        $commentDto = $this->serializer->deserialize($request->getContent(), CommentDto::class, 'json', [
            'groups' => ['create']
        ]);
        $commentDto->postId = $postId;

        $errors = $this->validator->validate($commentDto);

        if ($errors->count() === 0) {
            $comment = $this->dtoToEntityMapper->transform($commentDto);
            $this->commentRepository->add($comment);
            $commentDto = $this->entityToDtoMapper->transform($comment);

            return $this->responseFactory->makeResponse($commentDto, Response::HTTP_CREATED);
        }

        return new JsonResponse(['przypał'], Response::HTTP_BAD_REQUEST);
    }
}
