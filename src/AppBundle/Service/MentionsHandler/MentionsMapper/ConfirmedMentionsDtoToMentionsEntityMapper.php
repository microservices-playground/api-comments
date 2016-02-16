<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsMapper;

use Foodlove\AppBundle\Dto\Dto\ConfirmedMentionDto;
use Foodlove\AppBundle\Entity\Mention;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsMapper;

class ConfirmedMentionsDtoToMentionsEntityMapper implements MentionsMapper
{
    /**
     * @param ConfirmedMentionDto[] $mentionsDto
     *
     * @return Mention[]
     */
    public function map(array $mentionsDto): array
    {
        // TODO: Implement map() method.
    }
}
