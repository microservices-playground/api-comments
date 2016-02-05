<?php

namespace AppBundle\Dto\CollectionDto;

use AppBundle\Dto\CollectionDto;
use AppBundle\Dto\Dto\CommentDto;

class CommentCollectionDto implements CollectionDto
{
    /**
     * @var CommentDto[]
     */
    private $commentsDto;

    public function __construct(array $commentsDto)
    {
        foreach ($commentsDto as $commentDto) {
            if (!$commentDto instanceof CommentDto) {
                throw new \InvalidArgumentException('Only CommentDTO objects are acceptable in this collection');
            }
        }

        $this->commentsDto = $commentsDto;
    }

    public function getCollectionDto(): array
    {
        return $this->commentsDto;
    }
}
