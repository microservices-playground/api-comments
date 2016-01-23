<?php

namespace AppBundle\Dto\Outgoing;

use AppBundle\Dto\OutgoingDtoCollection;

class CommentCollection implements OutgoingDtoCollection
{
    /**
     * @var Comment[]
     */
    private $commentsDto;

    public function __construct(array $commentsDto)
    {
        foreach ($commentsDto as $commentDto) {
            if (!$commentDto instanceof Comment) {
                throw new \InvalidArgumentException('Only CommentDTO objects are acceptable in this collection');
            }
        }

        $this->commentsDto = $commentsDto;
    }

    public function jsonSerialize()
    {
        return $this->commentsDto;
    }
}
