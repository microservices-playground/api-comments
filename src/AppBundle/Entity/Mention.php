<?php

namespace AppBundle\Entity;

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

    public function setId(int $id): Mention
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setUserId(int $userId): Mention
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setComment(Comment $comment): Mention
    {
        $this->comment = $comment;

        return $this;
    }

    public function getComment(): Comment
    {
        return $this->comment;
    }
}
