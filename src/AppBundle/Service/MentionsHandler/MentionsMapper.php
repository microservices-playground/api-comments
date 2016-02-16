<?php

namespace Foodlove\AppBundle\Service\MentionsHandler;

use Foodlove\AppBundle\Dto\Dto\ConfirmedMentionDto;
use Foodlove\AppBundle\Entity\Mention;

interface MentionsMapper
{
    /**
     * @param ConfirmedMentionDto[] $mentionsDto
     *
     * @return Mention[]
     */
    public function map(array $mentionsDto): array;
}
