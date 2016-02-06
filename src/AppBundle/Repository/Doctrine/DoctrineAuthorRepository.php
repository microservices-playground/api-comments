<?php

namespace Foodlove\AppBundle\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Foodlove\AppBundle\Repository\AuthorRepository;

class DoctrineAuthorRepository extends EntityRepository implements AuthorRepository
{
    public function getById(int $id)
    {
        return $this->find($id);
    }
}
