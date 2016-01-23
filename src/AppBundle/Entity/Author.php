<?php

namespace AppBundle\Entity;

class Author
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

    /**
     * @var string
     */
    private $avatarFilename;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): Author
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): Author
    {
        $this->username = $username;

        return $this;
    }

    public function getAvatarFilename(): string
    {
        return $this->avatarFilename;
    }

    public function setAvatarFilename(string $avatarFilename): Author
    {
        $this->avatarFilename = $avatarFilename;

        return $this;
    }
}
