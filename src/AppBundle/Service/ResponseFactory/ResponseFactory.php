<?php

namespace Foodlove\AppBundle\Service\ResponseFactory;

use Symfony\Component\HttpFoundation\Response;

interface ResponseFactory
{
    public function makeResponse($data, int $httpStatus = Response::HTTP_OK, array $headers = []): Response;
}
