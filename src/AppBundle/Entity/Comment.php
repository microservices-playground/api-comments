<?php

namespace AppBundle\Entity;

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

    public function setId(int $id): Comment
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setPostId(int $postId): Comment
    {
        $this->postId = $postId;

        return $this;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function setUserId(int $userId): Comment
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setContent(string $content): Comment
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setCreatedAt(\DateTime $createdAt): Comment
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setActive(bool $active): Comment
    {
        $this->active = $active;

        return $this;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function addMention(Mention $mention): Comment
    {
        $this->mentions[] = $mention;
        $mention->setComment($this);

        return $this;
    }

    public function removeMention(Mention $mention): void
    {
        $this->mentions->removeElement($mention);
    }

    public function getMentions(): Collection
    {
        return $this->mentions;
    }
}
