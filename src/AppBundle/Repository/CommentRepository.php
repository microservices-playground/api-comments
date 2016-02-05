<?php

namespace Foodlove\AppBundle\Repository;

interface CommentRepository
{
    public function getCommentsByPostId(int $postId): array;
}
