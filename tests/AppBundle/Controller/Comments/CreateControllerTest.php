<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Dto\Dto\CommentDto;
use Foodlove\AppBundle\Service\CrudOperations\CreateHandler;
use Foodlove\AppBundle\Service\DtoFactory\DtoFactory;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Foodlove\AppBundle\Service\Validator\ValidationHandler;
use Mockery as m;
use Symfony\Component\HttpFoundation\Request;

class CreateControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateController
     */
    private $createController;

    /**
     * @var DtoFactory
     */
    private $dtoFactory;

    /**
     * @var ValidationHandler
     */
    private $validationHandler;

    /**
     * @var CreateHandler
     */
    private $createHandler;

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var CommentDto
     */
    private $commentDto;

    /**
     * @var CommentDto
     */
    private $createdCommentDto;

    public function setUp()
    {
        $this->dtoFactory = m::mock(DtoFactory::class);
        $this->validationHandler = m::mock(ValidationHandler::class);
        $this->createHandler = m::mock(CreateHandler::class);
        $this->responseFactory = m::mock(ResponseFactory::class);

        $this->createController = new CreateController(
            $this->dtoFactory,
            $this->validationHandler,
            $this->createHandler,
            $this->responseFactory
        );

        $this->request = m::mock(Request::class);
        $this->commentDto = m::mock(CommentDto::class);
        $this->createdCommentDto = m::mock(CommentDto::class);
    }

    public function testCreateAction()
    {
        $this->dtoFactory->shouldReceive('makeDto')->with($this->request)->once()->andReturn($this->commentDto);
        $this->validationHandler->shouldReceive('validate')->with($this->commentDto)->once();
        $this->createHandler->shouldReceive('create')->with($this->commentDto)->once()
            ->andReturn($this->createdCommentDto);
        $this->responseFactory->shouldReceive('makeResponse')->once();

        $this->createController->createAction($this->request);
    }
}
