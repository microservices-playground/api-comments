<?php

namespace Foodlove\AppBundle\Service\EventsHandler\Event;

use Foodlove\AppBundle\Service\EventsHandler\Event;

class CommentHasBeenAdded implements Event
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var int
     */
    private $postId;

    public function __construct(string $author, int $postId)
    {
        $this->author = $author;
        $this->postId = $postId;
    }

    public function getBody(): string
    {
        return json_encode([
            'timestamp' => (new \DateTime())->getTimestamp(),
            'event'     => Event::COMMENT_HAS_BEEN_ADDED,
            'author'    => $this->author,
            'post_id'   => $this->postId
        ]);
    }
}
