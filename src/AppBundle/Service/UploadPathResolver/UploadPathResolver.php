<?php

namespace AppBundle\Service\UploadPathResolver;

interface UploadPathResolver
{
    public function getUploadPath($filename): string;
}
