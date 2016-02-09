<?php

namespace Foodlove\AppBundle\Service\Validator\Handler;

use Foodlove\AppBundle\Exception\ValidationError;
use Foodlove\AppBundle\Service\Validator\Validatable;
use Foodlove\AppBundle\Service\Validator\ValidationHandler;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateCommentHandler implements ValidationHandler
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param Validatable $comment
     *
     * @throws ValidationError
     * @return void
     */
    public function handleValidation(Validatable $comment)
    {
        $errors = $this->validator->validate($comment);

        if ($errors->count()) {
            throw new ValidationError($errors);
        }
    }
}
