<?php

namespace Foodlove\AppBundle\Service\EventsHandler;

interface SystemWideEventDispatcher
{
    public function dispatch(Event $event);
}
