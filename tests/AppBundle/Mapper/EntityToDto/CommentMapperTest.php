<?php

namespace Tests\AppBundle\Mapper\EntityToDto;

use AppBundle\Dto\Dto\CommentDto;
use AppBundle\Entity\Author;
use AppBundle\Entity\Comment;
use AppBundle\Mapper\EntityToDto\CommentMapper;
use AppBundle\Service\UploadPathResolver\UploadPathResolver;
use Doctrine\Common\Collections\ArrayCollection;
use Mockery as m;

class CommentMapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UploadPathResolver
     */
    private $avatarUploadPathResolver;

    /**
     * @var CommentMapper
     */
    private $commentMapper;

    /**
     * @var Comment
     */
    private $comment;

    public function setUp()
    {
        $this->avatarUploadPathResolver = m::mock(UploadPathResolver::class);
        $this->avatarUploadPathResolver->shouldReceive('getUploadPath')->withArgs(['test.jpg'])
            ->andReturn('/avatars/test.jpg');

        $this->commentMapper = new CommentMapper($this->avatarUploadPathResolver);

        $createdAt = m::mock(\DateTime::class);
        $createdAt->shouldReceive('format')->andReturn('2016-01-25 10:25:00');

        $author = m::mock(Author::class);
        $author->shouldReceive('getUserId')->andReturn(123);
        $author->shouldReceive('getUsername')->andReturn('test_user');
        $author->shouldReceive('getAvatarFilename')->andReturn('test.jpg');

        $mappedMentions = m::mock(ArrayCollection::class);
        $mappedMentions->shouldReceive('toArray')->andReturn(['tester']);

        $mentions = m::mock(ArrayCollection::class);
        $mentions->shouldReceive('map')->andReturn($mappedMentions);

        $this->comment = m::mock(Comment::class);
        $this->comment->shouldReceive('getId')->andReturn(5);
        $this->comment->shouldReceive('getPostId')->andReturn(40);
        $this->comment->shouldReceive('getCreatedAt')->andReturn($createdAt);
        $this->comment->shouldReceive('getContent')->andReturn('test @tester foo bar');
        $this->comment->shouldReceive('getAuthor')->andReturn($author);
        $this->comment->shouldReceive('getMentions')->andReturn($mentions);
    }

    public function testTransform()
    {
        $commentDto = $this->commentMapper->transform($this->comment);

        $this->assertInstanceOf(CommentDto::class, $commentDto);
    }

    public function testTransformCollection()
    {
        $commentCollectionDto = $this->commentMapper->transformCollection([$this->comment]);

        $this->assertInternalType('array', $commentCollectionDto);
    }
}
