<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Comment implements \JsonSerializable, Entity
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
     * @var Author
     */
    private $author;

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

    public function setAuthor(Author $author): Comment
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function addMention(Mention $mention): Comment
    {
        $this->mentions[] = $mention;
        $mention->setComment($this);

        return $this;
    }

    public function removeMention(Mention $mention): Comment
    {
        $this->mentions->removeElement($mention);

        return $this;
    }

    public function getMentions(): Collection
    {
        return $this->mentions;
    }

    public function jsonSerialize(): array
    {
        $mentions = $this->getMentions()->map(function (Mention $mention) {
            return $mention->getUserId() . 'popraw mnie bo tu ma byc username';
        });

        return [
            'id'         => $this->getId(),
            'post_id'    => $this->getPostId(),
            'created_at' => $this->getCreatedAt()->format(\DateTime::W3C),
            'content'    => $this->getContent(),
            'user_id'    => $this->getAuthor()->getUserId(),
            'username'   => $this->getAuthor()->getUsername(),
            'mentions'   => $mentions->toArray(),
            'avatar'     => '/uploads/avatars/20a0df7e56e1b00eb531a79c7eaf30a46cafc257.jpg',
            'deletable'  => true
        ];
    }
}
