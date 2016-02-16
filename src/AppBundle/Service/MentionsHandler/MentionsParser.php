<?php

namespace Foodlove\AppBundle\Service\MentionsHandler;

interface MentionsParser
{
    /**
     * @param string $text
     *
     * @return string[]
     */
    public function findMentions(string $text): array;
}
