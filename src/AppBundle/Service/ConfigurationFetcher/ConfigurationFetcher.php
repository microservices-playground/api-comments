<?php

namespace Foodlove\AppBundle\Service\ConfigurationFetcher;

interface ConfigurationFetcher
{
    public function fetchConfigurationValue(string $configPath);
}
