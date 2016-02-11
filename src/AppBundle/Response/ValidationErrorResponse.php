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
        $errors = [];

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            $errors[$violation->getPropertyPath()][] = $violation->getMessage();
        }

        $errors = array_map(function (array $messages) {
            return implode(', ', $messages);
        }, $errors);

        parent::__construct(['message' => 'Validation error', 'errors'  => $errors], self::HTTP_BAD_REQUEST);
    }
}
