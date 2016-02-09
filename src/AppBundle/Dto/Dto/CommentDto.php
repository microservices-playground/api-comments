<?php

namespace Foodlove\AppBundle\Dto\Dto;

use Foodlove\AppBundle\Service\Validator\Validatable;
use Foodlove\AppBundle\Dto\Dto;

class CommentDto implements Dto, Validatable
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
