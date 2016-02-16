<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsParser;

use Foodlove\AppBundle\Service\MentionsHandler\MentionsParser;

class AtCharacterMentionsParser implements MentionsParser
{
    /**
     * @param string $text
     *
     * @return string[]
     */
    public function findMentions(string $text): array
    {
        preg_match_all('/@([a-zA-Z0-9_-]{3,255})/', $text, $mentions);

        return array_values(array_unique(array_pop($mentions)));
    }
}
