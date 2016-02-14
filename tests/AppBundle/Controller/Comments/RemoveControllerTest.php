<?php

namespace Foodlove\AppBundle\Controller\Comments;

use Foodlove\AppBundle\Service\CrudOperations\DeleteHandler;
use Foodlove\AppBundle\Service\ResponseFactory\ResponseFactory;
use Mockery as m;

class RemoveControllerTest extends \PHPUnit_Framework_TestCase
{
    const COMMENT_ID = 7;

    /**
     * @var RemoveController
     */
    private $removeController;

    /**
     * @var DeleteHandler
     */
    private $deleteHandler;

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    public function setUp()
    {
        $this->deleteHandler = m::mock(DeleteHandler::class);
        $this->responseFactory = m::mock(ResponseFactory::class);

        $this->removeController = new RemoveController($this->deleteHandler, $this->responseFactory);
    }

    public function testRemoveAction()
    {
        $this->deleteHandler->shouldReceive('delete')->with(self::COMMENT_ID)->once();
        $this->responseFactory->shouldReceive('makeResponse')->once();

        $this->removeController->removeAction(self::COMMENT_ID);
    }
}
