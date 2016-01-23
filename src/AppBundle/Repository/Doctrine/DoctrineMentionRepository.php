<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Repository\MentionRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineMentionRepository extends EntityRepository implements MentionRepository
{
}
