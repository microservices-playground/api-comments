<?php

namespace AppBundle\Dto\Dto;

use AppBundle\Dto\Dto;

class CommentDto implements Dto
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $postId;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var string
     */
    public $username;

    /**
     * @var array
     */
    public $mentions;

    /**
     * @var string
     */
    public $avatar;

    /**
     * @var bool
     */
    public $deletable;
}
