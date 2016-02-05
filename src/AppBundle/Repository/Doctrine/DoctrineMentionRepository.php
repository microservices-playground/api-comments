<?php

namespace Foodlove\AppBundle\Repository\Doctrine;

use Foodlove\AppBundle\Repository\MentionRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineMentionRepository extends EntityRepository implements MentionRepository
{
}
