<?php

namespace Foodlove\AppBundle\Service\ResponseFactory;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NoContentResponseFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NoContentResponseFactory
     */
    private $responseFactory;

    public function setUp()
    {
        $this->responseFactory = new NoContentResponseFactory();
    }

    public function testMakeResponseReturnsJsonResponse()
    {
        $response = $this->responseFactory->makeResponse();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getStatusCode());
    }
}
