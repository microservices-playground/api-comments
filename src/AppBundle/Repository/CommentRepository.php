<?php

namespace Foodlove\AppBundle\Repository;

use Foodlove\AppBundle\Entity\Entity;

interface CommentRepository
{
    public function add(Entity $comment);

    public function remove(Entity $comment);

    public function getById(int $id);

    public function getCommentsByPostId(int $postId): array;
}
