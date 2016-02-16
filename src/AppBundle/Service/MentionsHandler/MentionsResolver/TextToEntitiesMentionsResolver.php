<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsResolver;

use Foodlove\AppBundle\Entity\Mention;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsFetcher;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsMapper;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsParser;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsResolver;

class TextToEntitiesMentionsResolver implements MentionsResolver
{
    /**
     * @var MentionsParser
     */
    private $mentionsParser;

    /**
     * @var MentionsFetcher
     */
    private $mentionsFetcher;

    /**
     * @var MentionsMapper
     */
    private $mentionsMapper;

    public function __construct(
        MentionsParser $mentionsParser,
        MentionsFetcher $mentionsFetcher,
        MentionsMapper $mentionsMapper
    ) {
        $this->mentionsParser = $mentionsParser;
        $this->mentionsFetcher = $mentionsFetcher;
        $this->mentionsMapper = $mentionsMapper;
    }

    /**
     * @param string $text
     *
     * @return Mention[]
     */
    public function getMentions(string $text): array
    {
        $usernames = $this->mentionsParser->findMentions($text);
        $confirmedMentions = $this->mentionsFetcher->fetchMentions($usernames);

        return $this->mentionsMapper->map($confirmedMentions);
    }
}
