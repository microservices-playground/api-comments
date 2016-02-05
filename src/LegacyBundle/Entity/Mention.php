<?php

namespace Foodlove\LegacyBundle\Entity;

class Mention
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Comment
     */
    private $comment;

    /**
     * @var User
     */
    private $user;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getComment(): Comment
    {
        return $this->comment;
    }
}
