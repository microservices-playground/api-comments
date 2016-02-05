<?php

namespace Foodlove\AppBundle\Service\ConfigurationFetcher;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class LocalConfigurationFetcher implements ConfigurationFetcher
{
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    public function setParameterBag(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function fetchConfigurationValue(string $configPath)
    {
        if (null === $this->parameterBag) {
            throw new \LogicException('Parameter bag should be injected with setter method first');
        }

        return $this->parameterBag->get($configPath);
    }
}
