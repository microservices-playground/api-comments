<?php

namespace Foodlove\AppBundle\Service\CrudOperations\Comment;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Service\CrudOperations\CreateHandler;
use Foodlove\AppBundle\Service\EventsHandler\Event\CommentHasBeenAdded;
use Foodlove\AppBundle\Service\EventsHandler\EventDispatcher;

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
     * @var EventDispatcher
     */
    private $eventDispatcher;

    /**
     * @var EntityToDtoMapper
     */
    private $entityToDtoMapper;

    public function __construct(
        DtoToEntityMapper $dtoToEntityMapper,
        CommentRepository $commentRepository,
        EventDispatcher $eventDispatcher,
        EntityToDtoMapper $entityToDtoMapper
    ) {
        $this->dtoToEntityMapper = $dtoToEntityMapper;
        $this->commentRepository = $commentRepository;
        $this->eventDispatcher = $eventDispatcher;
        $this->entityToDtoMapper = $entityToDtoMapper;
    }

    public function create(Dto $commentDto): Dto
    {
        $comment = $this->dtoToEntityMapper->transform($commentDto);
        $this->commentRepository->add($comment);
        $this->eventDispatcher->dispatch(new CommentHasBeenAdded($commentDto));

        return $this->entityToDtoMapper->transform($comment);
    }
}
