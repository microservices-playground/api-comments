<?php

namespace LegacyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $postId;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var ArrayCollection
     */
    private $mentions;

    public function __construct()
    {
        $this->mentions = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getMentions(): Collection
    {
        return $this->mentions;
    }
}
