<?php

namespace Foodlove\AppBundle\Service\DtoFactory;

use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Mockery as m;

class CommentDtoFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CommentDtoFactory
     */
    private $commentDtoFactory;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function setUp()
    {
        $this->serializer = m::mock(SerializerInterface::class);

        $this->commentDtoFactory = new CommentDtoFactory($this->serializer);
    }

    public function testMakeDto()
    {
        $commentDto = m::mock(CommentDto::class);

        $parameterBag = m::mock(ParameterBagInterface::class);
        $parameterBag->shouldReceive('get')->once()->andReturn(567);

        $request = m::mock(Request::class);
        $request->shouldReceive('getContent')->once();
        $request->attributes = $parameterBag;

        $this->serializer->shouldReceive('deserialize')->once()->andReturn($commentDto);

        $this->commentDtoFactory->makeDto($request);
    }
}
