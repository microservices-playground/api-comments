<?php

namespace AppBundle\Mapper;

use AppBundle\Dto\Dto;
use AppBundle\Entity\Entity;

interface DtoToEntityMapper
{
    public function transform(Dto $dto): Entity;
}
