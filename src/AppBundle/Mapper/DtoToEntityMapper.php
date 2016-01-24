<?php

namespace AppBundle\Mapper;

use AppBundle\Dto\IncomingDto;
use AppBundle\Entity\Entity;

interface DtoToEntityMapper
{
    public function transform(IncomingDto $dto): Entity;
}
