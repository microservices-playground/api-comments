<?php

namespace Foodlove\AppBundle\Service\DtoFactory;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class CommentDtoFactory implements DtoFactory
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function makeDto(Request $request): Dto
    {
        $commentDto = $this->serializer->deserialize($request->getContent(), CommentDto::class, 'json', [
            'groups' => ['create']
        ]);

        $commentDto->postId = $request->attributes->get('postId');

        return $commentDto;
    }
}
