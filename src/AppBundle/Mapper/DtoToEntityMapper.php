<?php

namespace Foodlove\AppBundle\Mapper;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Entity\Entity;

interface DtoToEntityMapper
{
    public function transform(Dto $dto): Entity;
}
