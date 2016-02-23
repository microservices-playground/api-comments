<?php

namespace Foodlove\AppBundle\Service\EventsHandler\Event;

use Foodlove\AppBundle\Service\EventsHandler\Event;

class UserHasBeenMentioned implements Event
{
    public function getBody(): string
    {
        return 'user has beeen mentioned';
    }
}
