<?php

namespace Foodlove\AppBundle\Service\EventsHandler;

interface Event
{
    const COMMENT_HAS_BEEN_ADDED = 'comment_has_been_added';
    const USER_HAS_BEEN_MENTIONED = 'user_has_been_mentioned';

    public function getBody(): string;
}
