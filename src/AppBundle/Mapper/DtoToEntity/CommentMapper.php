<?php

namespace Foodlove\AppBundle\Mapper\DtoToEntity;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Entity\Comment;
use Foodlove\AppBundle\Entity\Entity;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Repository\AuthorRepository;

class CommentMapper implements DtoToEntityMapper
{
    const HARDCODED_AUTHOR_ID = 2;

    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function transform(Dto $dto): Entity
    {
        if (!$dto instanceof CommentDto) {
            throw new \InvalidArgumentException('You need to pass CommentDto object');
        }

        return (new Comment())
            ->setContent($dto->content)
            ->setPostId($dto->postId)
            ->setAuthor($this->authorRepository->getById(self::HARDCODED_AUTHOR_ID));
    }
}
