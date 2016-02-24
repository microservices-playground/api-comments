<?php

namespace Foodlove\AppBundle\Service\CrudOperations\Comment;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Entity\Comment;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Service\CrudOperations\CreateHandler;
use Foodlove\AppBundle\Service\EventsHandler\Event\CommentHasBeenAdded;
use Foodlove\AppBundle\Service\EventsHandler\SystemWideEventDispatcher;

class CreateCommentHandler implements CreateHandler
{
    /**
     * @var DtoToEntityMapper
     */
    private $dtoToEntityMapper;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var SystemWideEventDispatcher
     */
    private $systemWideEventDispatcher;

    /**
     * @var EntityToDtoMapper
     */
    private $entityToDtoMapper;

    public function __construct(
        DtoToEntityMapper $dtoToEntityMapper,
        CommentRepository $commentRepository,
        SystemWideEventDispatcher $systemWideEventDispatcher,
        EntityToDtoMapper $entityToDtoMapper
    ) {
        $this->dtoToEntityMapper = $dtoToEntityMapper;
        $this->commentRepository = $commentRepository;
        $this->systemWideEventDispatcher = $systemWideEventDispatcher;
        $this->entityToDtoMapper = $entityToDtoMapper;
    }

    public function create(Dto $commentDto): Dto
    {
        /** @var Comment $comment */
        $comment = $this->dtoToEntityMapper->transform($commentDto);
        $this->commentRepository->add($comment);
        $this->systemWideEventDispatcher->dispatch(new CommentHasBeenAdded(
            $comment->getAuthorsUsername(),
            $comment->getPostId()
        ));

        return $this->entityToDtoMapper->transform($comment);
    }
}
