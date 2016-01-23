<?php

namespace LegacyBundle\Entity;

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
     * @var int
     */
    private $userId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getComment(): Comment
    {
        return $this->comment;
    }
}
