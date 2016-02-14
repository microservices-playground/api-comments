<?php

namespace Foodlove\AppBundle\Service\Validator;

use Foodlove\AppBundle\Exception\ValidationError;

interface ValidationHandler
{
    /**
     * @param Validatable $object
     *
     * @throws ValidationError
     * @return void
     */
    public function validate(Validatable $object);
}
