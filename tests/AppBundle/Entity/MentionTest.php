<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Mention;

class MentionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Mention
     */
    private $mention;

    public function setUp()
    {
        $this->mention = new Mention();
    }

    public function testGetSetId()
    {
        $this->mention->setId(2);

        $this->assertEquals(2, $this->mention->getId());
    }

    public function testGetSetUserId()
    {
        $this->mention->setUserId(7);

        $this->assertEquals(7, $this->mention->getUserId());
    }

    public function testGetSetComment()
    {
        $comment = new Comment();
        $comment->setId(12);

        $this->mention->setComment($comment);
        $this->assertEquals($comment, $this->mention->getComment());
    }
}
