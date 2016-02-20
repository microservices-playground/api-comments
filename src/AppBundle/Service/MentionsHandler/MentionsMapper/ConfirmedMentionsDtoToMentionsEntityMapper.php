<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsMapper;

use Foodlove\AppBundle\Dto\Dto\ConfirmedMentionDto;
use Foodlove\AppBundle\Entity\Mention;
use Foodlove\AppBundle\Repository\MentionRepository;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsMapper;

class ConfirmedMentionsDtoToMentionsEntityMapper implements MentionsMapper
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
     * @param ConfirmedMentionDto[] $mentionsDto
     *
     * @return Mention[]
     */
    public function map(array $mentionsDto): array
    {
        $mentions = [];

        foreach ($mentionsDto as $mentionDto) {
            $mention = $this->mentionRepository->getByUserId($mentionDto->userId);

            if (null === $mention) {
                $mention = new Mention();
                $mention->setUserId($mentionDto->userId);
                $mention->setUsername($mentionDto->username);
            }

            $mentions[] = $mention;
        }

        return $mentions;
    }
}
