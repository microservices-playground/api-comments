<?php

namespace Tests\AppBundle\Entity;

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

    public function testGetSetUserId()
    {
        $this->mention->setUserId(7);

        $this->assertEquals(7, $this->mention->getUserId());
    }

    public function testGetSetUsername()
    {
        $this->mention->setUsername('test');

        $this->assertEquals('test', $this->mention->getUsername());
    }
}
