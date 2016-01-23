<?php

namespace AppBundle\Dto\Transformer;

use AppBundle\Dto\Dto;
use AppBundle\Entity\Entity;

interface DtoToEntityTransformer
{
    public function transform(Dto $dto): Entity;
}
