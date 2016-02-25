<?php

namespace Foodlove\AppBundle\Service\CrudOperations\Comment;

use Doctrine\Common\Collections\ArrayCollection;
use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Entity\Comment;
use Foodlove\AppBundle\Entity\Mention;
use Foodlove\AppBundle\Mapper\DtoToEntityMapper;
use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Service\EventsHandler\SystemWideEventDispatcher;
use Mockery as m;

class CreateCommentHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateCommentHandler
     */
    private $createCommentHandler;

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
    private $eventDispatcher;

    /**
     * @var EntityToDtoMapper
     */
    private $entityToDtoMapper;

    /**
     * @var CommentDto
     */
    private $commentDto;

    /**
     * @var Comment
     */
    private $comment;

    /**
     * @var Mention
     */
    private $mention;

    public function setUp()
    {
        $this->dtoToEntityMapper = m::mock(DtoToEntityMapper::class);
        $this->commentRepository = m::mock(CommentRepository::class);
        $this->eventDispatcher = m::mock(SystemWideEventDispatcher::class);
        $this->entityToDtoMapper = m::mock(EntityToDtoMapper::class);

        $this->commentDto = m::mock(CommentDto::class);
        $this->comment = m::mock(Comment::class);
        $this->mention = m::mock(Mention::class);

        $this->createCommentHandler = new CreateCommentHandler(
            $this->dtoToEntityMapper,
            $this->commentRepository,
            $this->eventDispatcher,
            $this->entityToDtoMapper
        );
    }

    public function testCreate()
    {
        $this->dtoToEntityMapper->shouldReceive('transform')->once()->andReturn($this->comment);
        $this->commentRepository->shouldReceive('add')->once()->withArgs([$this->comment]);
        $this->eventDispatcher->shouldReceive('dispatch');
        $this->entityToDtoMapper->shouldReceive('transform')->once()->withArgs([$this->comment])
            ->andReturn($this->commentDto);
        $this->mention->shouldReceive('getUsername')->andReturn('mentioned_user');
        $this->comment->shouldReceive('getAuthorsUsername')->andReturn('test');
        $this->comment->shouldReceive('getAuthorsAvatarFilename')->andReturn('test.jpg');
        $this->comment->shouldReceive('getPostId')->andReturn(123);
        $this->comment->shouldReceive('getMentions')->andReturn(new ArrayCollection([$this->mention]));

        $createdCommentDto = $this->createCommentHandler->create($this->commentDto);

        $this->assertInstanceOf(CommentDto::class, $createdCommentDto);
    }
}
