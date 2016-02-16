<?php

namespace Foodlove\AppBundle\Service\MentionsHandler;

use Foodlove\AppBundle\Entity\Mention;

interface MentionsResolver
{
    /**
     * @param string $text
     *
     * @return Mention[]
     */
    public function getMentions(string $text): array;
}
