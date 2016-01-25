<?php

namespace AppBundle\Controller\Comments;

use Symfony\Component\HttpFoundation\Response;

class RemoveController
{
    public function removeAction(int $postId, int $commentId): Response
    {
        return new Response('remove action');
    }
}
