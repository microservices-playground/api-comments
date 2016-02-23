<?php

namespace Foodlove\AppBundle\Service\EventsHandler;

interface Event
{
    const COMMENT_HAS_BEEN_ADDED = 'comment_has_been_added';

    public function getBody(): string;
}
