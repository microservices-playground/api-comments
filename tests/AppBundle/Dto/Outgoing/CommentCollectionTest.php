<?php

namespace Tests\AppBundle\Dto\CollectionDto;

use AppBundle\Dto\Dto\CommentDto;
use AppBundle\Dto\CollectionDto;

class CommentCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Comment
     */
    private $comment;

    public function setUp()
    {
        $this->comment = new CommentDto();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorThrowsExceptionIfNonCommentsAreInArray()
    {
        $invalidObject = new \DateTime();

        new CollectionDto\CommentCollectionDto([$this->comment, $invalidObject]);
    }

    public function testInstanceOfOutgoingDtoCollection()
    {
        $collection = new CollectionDto\CommentCollectionDto([$this->comment]);

        $this->assertInstanceOf(CollectionDto::class, $collection);
    }

    public function testGetCollectionDto()
    {
        $comments = [$this->comment];

        $collection = new CollectionDto\CommentCollectionDto($comments);
        $commentsDto = $collection->getCollectionDto();

        $this->assertEquals($comments, $commentsDto);
    }
}
