<?php

namespace AppBundle\Dto\Outgoing;

use AppBundle\Dto\OutgoingDto;

class Comment implements OutgoingDto
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
    private $createdAt;

    /**
     * @var string
     */
    private $content;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $username;

    /**
     * @var array
     */
    private $mentions;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var bool
     */
    private $deletable;

    public function __construct(
        int $id,
        int $postId,
        string $createdAt,
        string $content,
        int $userId,
        string $username,
        array $mentions,
        string $avatar,
        bool $deletable
    ) {
        $this->id = $id;
        $this->postId = $postId;
        $this->createdAt = $createdAt;
        $this->content = $content;
        $this->userId = $userId;
        $this->username = $username;
        $this->mentions = $mentions;
        $this->avatar = $avatar;
        $this->deletable = $deletable;
    }

    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'post_id'    => $this->postId,
            'created_at' => $this->createdAt,
            'content'    => $this->content,
            'user_id'    => $this->userId,
            'username'   => $this->username,
            'mentions'   => $this->mentions,
            'avatar'     => $this->avatar,
            'deletable'  => $this->deletable
        ];
    }
}
