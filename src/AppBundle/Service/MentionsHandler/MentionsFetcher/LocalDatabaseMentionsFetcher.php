<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsFetcher;

use Foodlove\AppBundle\Dto\Dto\ConfirmedMentionDto;
use Foodlove\AppBundle\Repository\MentionRepository;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsFetcher;

class LocalDatabaseMentionsFetcher implements MentionsFetcher
{
    /**
     * @var MentionRepository
     */
    private $mentionRepository;

    public function __construct(MentionRepository $mentionRepository)
    {
        $this->mentionRepository = $mentionRepository;
    }

    /**
     * @param string[] $usernames
     *
     * @return ConfirmedMentionDto[]
     */
    public function fetchMentions(array $usernames)
    {
        $mentions = $this->mentionRepository->getMentionsByUsernames($usernames);
        $confirmedMentionsDto = [];

        foreach ($mentions as $mention) {
            $confirmedMentionDto = new ConfirmedMentionDto();
            $confirmedMentionDto->userId = $mention->getUserId();
            $confirmedMentionDto->username = $mention->getUsername();

            $confirmedMentionsDto[] = $confirmedMentionDto;
        }

        return $confirmedMentionsDto;
    }
}
