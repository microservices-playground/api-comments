<?php

namespace Tests\AppBundle\Dto\Outgoing;

use AppBundle\Dto\Outgoing\Comment;
use AppBundle\Dto\Outgoing\CommentCollection;
use AppBundle\Dto\OutgoingDtoCollection;

class CommentCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Comment
     */
    private $comment;

    public function setUp()
    {
        $this->comment = new Comment(
            5,
            22,
            '2015-05-12 12:40:22',
            'test @tester content',
            52,
            'test_user',
            ['tester'],
            '/avatars/test.jpg',
            true
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorThrowsExceptionIfNonCommentsAreInArray()
    {
        $invalidObject = new \DateTime();

        new CommentCollection([$this->comment, $invalidObject]);
    }

    public function testInstanceOfOutgoingDtoCollection()
    {
        $collection = new CommentCollection([$this->comment]);

        $this->assertInstanceOf(OutgoingDtoCollection::class, $collection);
    }

    public function testJsonSerialize()
    {
        $expectedJson = json_encode([
            [
                'id'         => 5,
                'post_id'    => 22,
                'created_at' => '2015-05-12 12:40:22',
                'content'    => 'test @tester content',
                'user_id'    => 52,
                'username'   => 'test_user',
                'mentions'   => ['tester'],
                'avatar'     => '/avatars/test.jpg',
                'deletable'  => true
            ]
        ]);

        $collection = new CommentCollection([$this->comment]);
        $encodedJson = json_encode($collection);

        $this->assertJsonStringEqualsJsonString($expectedJson, $encodedJson);
    }
}
