<?php

namespace Foodlove\AppBundle\Service\CrudOperations\Comment;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Service\CrudOperations\CreateHandler;

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
     * @var EntityToDtoMapper
     */
    private $entityToDtoMapper;

    public function __construct(
        DtoToEntityMapper $dtoToEntityMapper,
        CommentRepository $commentRepository,
        EntityToDtoMapper $entityToDtoMapper
    ) {
        $this->dtoToEntityMapper = $dtoToEntityMapper;
        $this->commentRepository = $commentRepository;
        $this->entityToDtoMapper = $entityToDtoMapper;
    }

    public function create(Dto $commentDto): Dto
    {
        $comment = $this->dtoToEntityMapper->transform($commentDto);
        $this->commentRepository->add($comment);

        return $this->entityToDtoMapper->transform($comment);
    }
}
