<?php

namespace AppBundle\Dto\Transformer;

use AppBundle\Dto\Dto;
use AppBundle\Entity\Entity;

interface EntityToDtoTransformer
{
    public function transform(Entity $entity): Dto;
}
