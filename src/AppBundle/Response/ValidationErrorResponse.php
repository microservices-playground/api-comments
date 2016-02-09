<?php

namespace Foodlove\AppBundle\Response;

use Foodlove\AppBundle\Exception\ValidationError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintViolationInterface;

class ValidationErrorResponse extends JsonResponse
{
    public function __construct(ValidationError $validationErrorException)
    {
        $violations = $validationErrorException->getViolations();

        $validationError = [
            'message' => 'Validation failed',
            'errors'  => []
        ];

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            $validationError['errors'][$violation->getPropertyPath()][] = $violation->getMessage();
        }

        parent::__construct($validationError, JsonResponse::HTTP_BAD_REQUEST);
    }
}
