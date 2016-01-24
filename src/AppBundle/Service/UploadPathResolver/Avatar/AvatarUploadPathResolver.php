<?php

namespace AppBundle\Service\UploadPathResolver\Avatar;

use AppBundle\Service\ConfigurationFetcher\ConfigurationFetcher;
use AppBundle\Service\UploadPathResolver\UploadPathResolver;

class AvatarUploadPathResolver implements UploadPathResolver
{
    /**
     * @var ConfigurationFetcher
     */
    private $configurationFetcher;

    public function __construct(ConfigurationFetcher $configurationFetcher)
    {
        $this->configurationFetcher = $configurationFetcher;
    }

    public function getUploadPath($filename): string
    {
        if (null === $filename) {
            return $this->configurationFetcher->fetchConfigurationValue('avatar.default_avatar');
        }

        $path = $this->configurationFetcher->fetchConfigurationValue('avatar.upload_path');
        $filePath = $path . '/' . $filename;

        $filePath = $this->sanitizeMultipleSlashes($filePath);

        return $filePath;
    }

    private function sanitizeMultipleSlashes(string $filePath): string
    {
        return preg_replace('#/+#', '/', $filePath);
    }
}
