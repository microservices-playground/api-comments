<?php

namespace Foodlove\AppBundle\Service\EventsHandler\Event;

use Foodlove\AppBundle\Service\EventsHandler\Event;

class UserHasBeenMentioned implements Event
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $mentionedPerson;

    /**
     * @var int
     */
    private $postId;

    public function __construct(string $author, string $mentionedPerson, int $postId)
    {
        $this->author = $author;
        $this->mentionedPerson = $mentionedPerson;
        $this->postId = $postId;
    }

    public function getBody(): string
    {
        return json_encode([
            'timestamp'        => (new \DateTime())->getTimestamp(),
            'event'            => Event::COMMENT_HAS_BEEN_ADDED,
            'author'           => $this->author,
            'mentioned_person' => $this->mentionedPerson,
            'post_id'          => $this->postId
        ]);
    }
}
