<?php

namespace Foodlove\AppBundle\Service\Validator\Handler;

use Foodlove\AppBundle\Service\Validator\Validatable;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Mockery as m;

class CreateCommentHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateCommentHandler
     */
    private $validationHandler;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function setUp()
    {
        $this->validator = m::mock(ValidatorInterface::class);

        $this->validationHandler = new CreateCommentHandler($this->validator);
    }

    /**
     * @expectedException \Foodlove\AppBundle\Exception\ValidationError
     */
    public function testValidateThrowsExceptionIfValidationFails()
    {
        $errors = m::mock(ConstraintViolationListInterface::class);
        $errors->shouldReceive('count')->andReturn(2);

        $comment = m::mock(Validatable::class);

        $this->validator->shouldReceive('validate')->once()->andReturn($errors);

        $this->validationHandler->validate($comment);
    }

    public function testValidateDoesNotThrowExceptionIfThereAreNoErrors()
    {
        $errors = m::mock(ConstraintViolationListInterface::class);
        $errors->shouldReceive('count')->andReturn(0);

        $comment = m::mock(Validatable::class);

        $this->validator->shouldReceive('validate')->once()->andReturn($errors);

        $this->validationHandler->validate($comment);
    }
}
