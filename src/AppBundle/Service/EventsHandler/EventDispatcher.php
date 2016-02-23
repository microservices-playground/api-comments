<?php

namespace Foodlove\AppBundle\Service\EventsHandler;

interface EventDispatcher
{
    public function dispatch(Event $event);
}
