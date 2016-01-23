<?php

namespace AppBundle\Repository;

interface CommentRepository
{
    public function getCommentsByPostId(int $postId): array;
}
