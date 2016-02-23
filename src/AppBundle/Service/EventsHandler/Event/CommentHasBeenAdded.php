<?php

namespace Foodlove\AppBundle\Service\EventsHandler\Event;

use Foodlove\AppBundle\Service\EventsHandler\Event;

class CommentHasBeenAdded implements Event
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $avatarFilename;

    /**
     * @var int
     */
    private $postId;

    public function __construct(string $username, string $avatarFilename, int $postId)
    {
        $this->username = $username;
        $this->avatarFilename = $avatarFilename;
        $this->postId = $postId;
    }

    public function getBody(): string
    {
        return json_encode([
            'timestamp'       => (new \DateTime())->getTimestamp(),
            'event'           => Event::COMMENT_HAS_BEEN_ADDED,
            'username'        => $this->username,
            'avatar_filename' => $this->avatarFilename,
            'post_id'         => $this->postId,
        ]);
    }
}
