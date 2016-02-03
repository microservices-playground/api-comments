<?php

namespace AppBundle\Controller\Comments;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateController
{
    public function createAction(Request $request, int $postId): Response
    {
        return new Response('create_comments ' . $postId, 201);
    }
}
