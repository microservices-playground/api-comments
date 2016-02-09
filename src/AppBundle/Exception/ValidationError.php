<?php

namespace Foodlove\AppBundle\Exception;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationError extends \Exception
{
    /**
     * @var ConstraintViolationListInterface
     */
    private $violations;

    public function __construct(ConstraintViolationListInterface $violations)
    {
        parent::__construct('Validation error');

        $this->violations = $violations;
    }

    public function getViolations(): ConstraintViolationListInterface
    {
        return $this->violations;
    }
}
