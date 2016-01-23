<?php

namespace AppBundle\Transformer;

use AppBundle\Dto\OutgoingDto;
use AppBundle\Dto\OutgoingDtoCollection;
use AppBundle\Entity\Entity;

interface EntityToDtoTransformer
{
    public function transform(Entity $entity): OutgoingDto;

    public function transformCollection(array $collection): OutgoingDtoCollection;
}
