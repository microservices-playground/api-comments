<?php

namespace AppBundle\Service\ResponseFactory;

use Foodlove\AppBundle\Service\ResponseFactory\DtoResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Mockery as m;

class DtoResponseFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DtoResponseFactory
     */
    private $dtoResponseFactory;

    /**
     * @var \stdClass
     */
    private $dto;

    /**
     * @var array
     */
    private $normalizedDto;

    public function setUp()
    {
        $this->dto = new class {
        public $name = 'Some value';
        };
        $this->normalizedDto = ['name' => 'Some value'];

        $normalizer = m::mock(NormalizerInterface::class);
        $normalizer->shouldReceive('normalize')->andReturn($this->normalizedDto);

        $this->dtoResponseFactory = new DtoResponseFactory($normalizer);
    }

    public function testMakeResponseReturnsJsonResponse()
    {
        $response = $this->dtoResponseFactory->makeResponse($this->dto, Response::HTTP_CREATED, [
            'X-Additional-Header' => 'Test'
        ]);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        $this->assertEquals('Test', $response->headers->get('X-Additional-Header'));
    }
}
