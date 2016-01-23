<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Author;

class AuthorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Author
     */
    private $author;

    public function setUp()
    {
        $this->author = new Author();
    }

    public function testGetSetUserId()
    {
        $this->author->setUserId(5);

        $this->assertEquals(5, $this->author->getUserId());
    }

    public function testGetSetUsername()
    {
        $this->author->setUsername('test');

        $this->assertEquals('test', $this->author->getUsername());
    }

    public function testGetSetAvatarFilename()
    {
        $this->author->setAvatarFilename('test.jpg');

        $this->assertEquals('test.jpg', $this->author->getAvatarFilename());
    }
}
