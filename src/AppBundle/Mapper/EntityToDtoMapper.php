<?php

namespace Foodlove\AppBundle\Mapper;

use Foodlove\AppBundle\Dto\Dto;
use Foodlove\AppBundle\Entity\Entity;

interface EntityToDtoMapper
{
    public function transform(Entity $entity): Dto;

    public function transformCollection(array $collection): array;
}
