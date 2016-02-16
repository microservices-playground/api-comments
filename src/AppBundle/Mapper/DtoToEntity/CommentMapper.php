<?php

namespace Foodlove\AppBundle\Mapper\DtoToEntity;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Entity\Comment;
use Foodlove\AppBundle\Entity\Entity;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Repository\AuthorRepository;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsParser;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsResolver;

class CommentMapper implements DtoToEntityMapper
{
    const HARDCODED_AUTHOR_ID = 2;

    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    /**
     * @var MentionsResolver
     */
    private $mentionsResolver;

    public function __construct(AuthorRepository $authorRepository, MentionsResolver $mentionsResolver)
    {
        $this->authorRepository = $authorRepository;
        $this->mentionsResolver = $mentionsResolver;
    }

    public function transform(Dto $dto): Entity
    {
        if (!$dto instanceof CommentDto) {
            throw new \InvalidArgumentException('You need to pass CommentDto object');
        }

        $mentions = $this->mentionsResolver->getMentions($dto->content);

        $comment = (new Comment())
            ->setContent($dto->content)
            ->setPostId($dto->postId)
            ->setAuthor($this->authorRepository->getById(self::HARDCODED_AUTHOR_ID));

        foreach ($mentions as $mention) {
            $comment->addMention($mention);
        }

        return $comment;
    }
}
