<?php

namespace AppBundle\Mapper;

use AppBundle\Dto\OutgoingDto;
use AppBundle\Dto\OutgoingDtoCollection;
use AppBundle\Entity\Entity;

interface EntityToDtoMapper
{
    public function transform(Entity $entity): OutgoingDto;

    public function transformCollection(array $collection): OutgoingDtoCollection;
}
