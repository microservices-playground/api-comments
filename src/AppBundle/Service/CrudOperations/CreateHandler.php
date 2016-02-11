<?php

namespace Foodlove\AppBundle\Service\CrudOperations;

use Foodlove\AppBundle\Dto\Dto;

interface CreateHandler
{
    public function create(Dto $dto): Dto;
}
