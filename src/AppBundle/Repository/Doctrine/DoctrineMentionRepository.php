<?php

namespace Foodlove\AppBundle\Repository\Doctrine;

use Foodlove\AppBundle\Entity\Mention;
use Foodlove\AppBundle\Repository\MentionRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineMentionRepository extends EntityRepository implements MentionRepository
{
    /**
     * @param int $userId
     *
     * @return Mention
     */
    public function getByUserId(int $userId)
    {
        return $this->findOneBy(['userId' => $userId]);
    }

    public function getMentionsByUsernames(array $usernames): array
    {
        $queryBuilder = $this->createQueryBuilder('m');

        $queryBuilder
            ->where('m.username IN (:usernames)')
            ->setParameter(':usernames', $usernames);

        return $queryBuilder->getQuery()->execute();
    }
}
