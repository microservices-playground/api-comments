<?php

namespace Foodlove\AppBundle\Service\ResponseFactory;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DtoResponseFactory implements ResponseFactory
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    public function __construct(NormalizerInterface $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function makeResponse($data = null, int $httpStatus = Response::HTTP_OK, array $headers = []): Response
    {
        $data = $this->normalizer->normalize($data, JsonEncoder::FORMAT);

        return new JsonResponse($data, $httpStatus, $headers);
    }
}
