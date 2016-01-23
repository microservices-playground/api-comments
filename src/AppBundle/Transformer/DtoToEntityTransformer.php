<?php

namespace AppBundle\Transformer;

use AppBundle\Dto\IncomingDto;
use AppBundle\Entity\Entity;

interface DtoToEntityTransformer
{
    public function transform(IncomingDto $dto): Entity;
}
