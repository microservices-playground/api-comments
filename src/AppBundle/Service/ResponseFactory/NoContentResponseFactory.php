<?php

namespace Foodlove\AppBundle\Service\ResponseFactory;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NoContentResponseFactory implements ResponseFactory
{
    public function makeResponse(
        $data = null,
        int $httpStatus = Response::HTTP_NO_CONTENT,
        array $headers = []
    ): Response {
        return new JsonResponse(null, Response::HTTP_NO_CONTENT, $headers);
    }
}
