<?php

namespace Foodlove\AppBundle\Service\ExceptionHandler;

use Foodlove\AppBundle\Exception\ValidationError;
use Foodlove\AppBundle\Response\GenericErrorResponse;
use Foodlove\AppBundle\Response\ValidationErrorResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof ValidationError) {
            $response = new ValidationErrorResponse($exception);
        } elseif ($exception instanceof HttpExceptionInterface) {
            $response = new GenericErrorResponse(
                ['message' => $exception->getMessage()],
                $exception->getStatusCode()
            );
        } else {
            $response = new GenericErrorResponse(
                ['message' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        $event->setResponse($response);
    }
}
