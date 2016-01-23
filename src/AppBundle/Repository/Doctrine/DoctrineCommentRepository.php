<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Repository\CommentRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineCommentRepository extends EntityRepository implements CommentRepository
{
    public function getCommentsByPostId(int $postId): array
    {
        $queryBuilder = $this->createQueryBuilder('c');

        $queryBuilder
            ->join('c.mentions', 'm')
            ->where('c.postId = :postId')
            ->orderBy('c.createdAt', 'DESC')
            ->setParameter(':postId', $postId);

        return $queryBuilder->getQuery()->execute();
    }
}
