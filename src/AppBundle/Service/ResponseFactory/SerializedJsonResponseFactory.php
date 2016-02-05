<?php

namespace AppBundle\Service\ResponseFactory;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class SerializedJsonResponseFactory implements ResponseFactory
{
    /**
     * @var DecoderInterface
     */
    private $decoder;

    public function __construct(DecoderInterface $decoder)
    {
        $this->decoder = $decoder;
    }

    public function makeResponse($data = null, int $httpStatus = Response::HTTP_OK, array $headers = []): Response
    {
        $data = $this->decoder->decode($data, JsonEncoder::FORMAT);

        return new JsonResponse($data, $httpStatus, $headers);
    }
}
