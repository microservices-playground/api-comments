<?php

namespace AppBundle\Controller\Comments;

use AppBundle\Dto\Dto\CommentDto;
use AppBundle\Service\ResponseFactory\ResponseFactory;
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

    public function __construct(
        ResponseFactory $responseFactory,
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ) {
        $this->responseFactory = $responseFactory;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    public function createAction(Request $request, int $postId): Response
    {
        $commentDto = $this->serializer->deserialize($request->getContent(), CommentDto::class, 'json', [
            'groups' => ['create']
        ]);

        //$output = ;

        return $this->responseFactory->makeResponse(
            $this->serializer->serialize($commentDto, 'json', ['groups' => ['expose']]),
            Response::HTTP_CREATED
        );
    }
}
