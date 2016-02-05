<?php

namespace Foodlove\AppBundle\Service\UploadPathResolver;

interface UploadPathResolver
{
    public function getUploadPath($filename): string;
}
