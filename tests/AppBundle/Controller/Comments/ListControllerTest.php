<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Mapper\EntityToDtoMapper;
use Foodlove\AppBundle\Repository\CommentRepository;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Mockery as m;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testListAction()
    {
        $responseFactory = m::mock(ResponseFactory::class);
        $responseFactory->shouldReceive('makeResponse')->andReturn(m::mock(JsonResponse::class));

        $commentRepository = m::mock(CommentRepository::class);
        $commentRepository->shouldReceive('getCommentsByPostId')->andReturn([]);

        $commentsMapper = m::mock(EntityToDtoMapper::class);
        $commentsMapper->shouldReceive('transformCollection')->andReturn([]);

        $controller = new ListController($responseFactory, $commentRepository, $commentsMapper);

        $response = $controller->listAction(5);

        $this->assertInstanceOf(JsonResponse::class, $response);
    }
}
