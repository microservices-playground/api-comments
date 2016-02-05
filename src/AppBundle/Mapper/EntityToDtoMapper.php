<?php

namespace AppBundle\Mapper;

use AppBundle\Dto\Dto;
use AppBundle\Entity\Entity;

interface EntityToDtoMapper
{
    public function transform(Entity $entity): Dto;

    public function transformCollection(array $collection): array;
}
