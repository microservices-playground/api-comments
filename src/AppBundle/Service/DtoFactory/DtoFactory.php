<?php

namespace Foodlove\AppBundle\Service\DtoFactory;

use Foodlove\AppBundle\Dto\Dto;
use Symfony\Component\HttpFoundation\Request;

interface DtoFactory
{
    public function makeDto(Request $request): Dto;
}
