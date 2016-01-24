<?php

namespace LegacyBundle\Entity;

class Parameter
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $parameterId;

    /**
     * @var string
     */
    private $value;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getParameterId(): int
    {
        return $this->parameterId;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
