<?php

namespace Foodlove\AppBundle\Service\MentionsHandler;

use Foodlove\AppBundle\Dto\Dto\ConfirmedMentionDto;

interface MentionsFetcher
{
    /**
     * @param string[] $usernames
     *
     * @return ConfirmedMentionDto[]
     */
    public function fetchMentions(array $usernames);
}
