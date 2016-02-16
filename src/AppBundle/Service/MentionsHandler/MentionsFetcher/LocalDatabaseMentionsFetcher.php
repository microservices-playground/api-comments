<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsFetcher;

use Foodlove\AppBundle\Dto\Dto\ConfirmedMentionDto;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsFetcher;

class LocalDatabaseMentionsFetcher implements MentionsFetcher
{
    /**
     * @param string[] $usernames
     *
     * @return ConfirmedMentionDto[]
     */
    public function fetchMentions(array $usernames)
    {
        // TODO: Implement fetchMentions() method.
    }
}
