<?php

namespace Foodlove\AppBundle\Service\CrudOperations\Comment;

use Foodlove\AppBundle\Entity\Comment;
use Foodlove\AppBundle\Repository\CommentRepository;
use Mockery as m;

class DeleteCommentHandlerTest extends \PHPUnit_Framework_TestCase
{
    const COMMENT_ID = 8;

    /**
     * @var DeleteCommentHandler
     */
    private $deleteCommentHandler;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function setUp()
    {
        $this->commentRepository = m::mock(CommentRepository::class);

        $this->deleteCommentHandler = new DeleteCommentHandler($this->commentRepository);
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testDeleteThrowsExceptionIfNoCommentIsFound()
    {
        $this->commentRepository->shouldReceive('getById')->with(self::COMMENT_ID)->andReturn(null);

        $this->deleteCommentHandler->delete(self::COMMENT_ID);
    }

    public function testDelete()
    {
        $comment = m::mock(Comment::class);

        $this->commentRepository->shouldReceive('getById')->with(self::COMMENT_ID)->andReturn($comment);
        $this->commentRepository->shouldReceive('remove')->with($comment)->once();

        $this->deleteCommentHandler->delete(self::COMMENT_ID);
    }
}
