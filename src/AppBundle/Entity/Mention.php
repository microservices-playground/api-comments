<?php

namespace AppBundle\Entity;

class Mention implements Entity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $username;

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

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): Mention
    {
        $this->username = $username;

        return $this;
    }
}
