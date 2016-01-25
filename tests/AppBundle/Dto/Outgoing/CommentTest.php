<?php

namespace Tests\AppBundle\Dto\Outgoing;

use AppBundle\Dto\Outgoing\Comment;
use AppBundle\Dto\OutgoingDto;

class CommentTest extends \PHPUnit_Framework_TestCase
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

    public function testInstanceOfOutgoingDto()
    {
        $this->assertInstanceOf(OutgoingDto::class, $this->comment);
    }

    public function testJsonSerialize()
    {
        $expectedJson = json_encode([
            'id'         => 5,
            'post_id'    => 22,
            'created_at' => '2015-05-12 12:40:22',
            'content'    => 'test @tester content',
            'user_id'    => 52,
            'username'   => 'test_user',
            'mentions'   => ['tester'],
            'avatar'     => '/avatars/test.jpg',
            'deletable'  => true
        ]);

        $encodedJson = json_encode($this->comment);

        $this->assertJsonStringEqualsJsonString($expectedJson, $encodedJson);
    }
}
