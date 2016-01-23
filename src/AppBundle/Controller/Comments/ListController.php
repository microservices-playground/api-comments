<?php

namespace AppBundle\Controller\Comments;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListController
{
    public function listAction(Request $request, int $postId): Response
    {
        return new Response('list_comments ' . $postId);
    }
}
