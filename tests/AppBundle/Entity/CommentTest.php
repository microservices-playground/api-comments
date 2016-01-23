<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Author;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Mention;
use Doctrine\Common\Collections\Collection;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Comment
     */
    private $comment;

    public function setUp()
    {
        $this->comment = new Comment();
    }

    public function testGetSetId()
    {
        $this->comment->setId(5);

        $this->assertEquals(5, $this->comment->getId());
    }

    public function testGetSetPostId()
    {
        $this->comment->setPostId(6);

        $this->assertEquals(6, $this->comment->getPostId());
    }

    public function testGetSetContent()
    {
        $this->comment->setContent('test content');

        $this->assertEquals('test content', $this->comment->getContent());
    }

    public function testGetSetCreatedAt()
    {
        $createdAt = new \DateTime('yesterday');

        $this->comment->setCreatedAt($createdAt);

        $this->assertEquals($createdAt, $this->comment->getCreatedAt());
    }

    public function testGetSetActive()
    {
        $this->comment->setActive(false);

        $this->assertFalse($this->comment->getActive());
    }

    public function testGetSetAuthor()
    {
        $author = new Author();
        $author->setUsername('test');

        $this->comment->setAuthor($author);

        $this->assertEquals($author, $this->comment->getAuthor());
    }

    public function testGetAddRemoveMention()
    {
        $this->assertInstanceOf(Collection::class, $this->comment->getMentions());
        $this->assertEmpty($this->comment->getMentions());

        $mention1 = new Mention();
        $mention1->setId(73);

        $mention2 = new Mention();
        $mention2->setId(89);

        $this->comment->addMention($mention1);
        $this->comment->addMention($mention2);
        $this->assertCount(2, $this->comment->getMentions());

        $this->comment->removeMention($mention1);
        $this->assertCount(1, $this->comment->getMentions());
    }
}
