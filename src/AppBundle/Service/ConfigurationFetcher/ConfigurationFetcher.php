<?php

namespace AppBundle\Service\ConfigurationFetcher;

interface ConfigurationFetcher
{
    public function fetchConfigurationValue(string $configPath);
}
