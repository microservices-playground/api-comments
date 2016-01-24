<?php

namespace Tests\AppBundle\Service\UploadPathResolver\Avatar;

use AppBundle\Service\ConfigurationFetcher\ConfigurationFetcher;
use AppBundle\Service\UploadPathResolver\Avatar\AvatarUploadPathResolver;
use Mockery as m;

class AvatarUploadPathResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ConfigurationFetcher
     */
    private $configurationFetcher;

    /**
     * @var AvatarUploadPathResolver
     */
    private $avatarUploadPathResolver;

    public function setUp()
    {
        $this->configurationFetcher = m::mock(ConfigurationFetcher::class);
        $this->avatarUploadPathResolver = new AvatarUploadPathResolver($this->configurationFetcher);
    }

    public function testGetUploadPathReturnsDefaultAvatarIfFilenameIsBlank()
    {
        $this->configurationFetcher->shouldReceive('fetchConfigurationValue')->withArgs(['avatar.default_avatar'])
            ->andReturn('/assets/img/default_avatar.png');

        $avatar = $this->avatarUploadPathResolver->getUploadPath(null);

        $this->assertEquals('/assets/img/default_avatar.png', $avatar);
    }

    public function testGetUploadPath()
    {
        $this->configurationFetcher->shouldReceive('fetchConfigurationValue')->withArgs(['avatar.upload_path'])
            ->andReturn('/upload/avatars');

        $uploadPath = $this->avatarUploadPathResolver->getUploadPath('test.jpg');

        $this->assertEquals('/upload/avatars/test.jpg', $uploadPath);
    }

    public function testGetUploadPathSanitizeMultipleSlashes()
    {
        $this->configurationFetcher->shouldReceive('fetchConfigurationValue')->andReturn('/upload/avatars/');

        $uploadPath = $this->avatarUploadPathResolver->getUploadPath('test.jpg');

        $this->assertEquals('/upload/avatars/test.jpg', $uploadPath);
    }
}
