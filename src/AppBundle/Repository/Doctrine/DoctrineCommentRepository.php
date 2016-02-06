<?php

namespace Foodlove\AppBundle\Repository\Doctrine;

use Foodlove\AppBundle\Entity\Entity;
use Foodlove\AppBundle\Repository\CommentRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineCommentRepository extends EntityRepository implements CommentRepository
{
    public function add(Entity $comment)
    {
        $this->getEntityManager()->persist($comment);
        $this->getEntityManager()->flush();
    }

    public function getCommentsByPostId(int $postId): array
    {
        $queryBuilder = $this->createQueryBuilder('c');

        $queryBuilder
            ->leftJoin('c.mentions', 'm')
            ->where('c.postId = :postId')
            ->orderBy('c.createdAt', 'DESC')
            ->setParameter(':postId', $postId);

        return $queryBuilder->getQuery()->execute();
    }
}
