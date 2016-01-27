<?php

namespace Tests\AppBundle\Controller\Comments;

use AppBundle\Controller\Comments\ListController;
use AppBundle\Dto\OutgoingDtoCollection;
use AppBundle\Mapper\EntityToDtoMapper;
use AppBundle\Repository\CommentRepository;
use Mockery as m;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testListAction()
    {
        $commentRepository = m::mock(CommentRepository::class);
        $commentRepository->shouldReceive('getCommentsByPostId')->andReturn([]);

        $outgoingDtoCollection = m::mock(OutgoingDtoCollection::class);
        $outgoingDtoCollection->shouldReceive('jsonSerialize')->andReturn([]);

        $commentsMapper = m::mock(EntityToDtoMapper::class);
        $commentsMapper->shouldReceive('transformCollection')->andReturn($outgoingDtoCollection);

        $controller = new ListController($commentRepository, $commentsMapper);

        $response = $controller->listAction(5);

        $this->assertInstanceOf(JsonResponse::class, $response);
    }
}
