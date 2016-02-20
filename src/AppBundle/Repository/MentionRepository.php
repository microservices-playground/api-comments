<?php

namespace Foodlove\AppBundle\Repository;

use Foodlove\AppBundle\Entity\Mention;

interface MentionRepository
{
    /**
     * @param int $userId
     *
     * @return Mention
     */
    public function getByUserId(int $userId);

    /**
     * @param string[] $usernames
     *
     * @return Mention[]
     */
    public function getMentionsByUsernames(array $usernames): array;
}
