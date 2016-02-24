<?php

namespace Foodlove\AppBundle\Service\EventsHandler\EventDispatcher;

use Foodlove\AppBundle\Service\EventsHandler\Event;
use Foodlove\AppBundle\Service\EventsHandler\SystemWideEventDispatcher;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;

class RabbitMqSystemWideEventDispatcher implements SystemWideEventDispatcher
{
    /**
     * @var ProducerInterface
     */
    private $producer;

    public function __construct(ProducerInterface $producer)
    {
        $this->producer = $producer;
    }

    public function dispatch(Event $event)
    {
        $this->producer->publish($event->getBody());
    }
}
