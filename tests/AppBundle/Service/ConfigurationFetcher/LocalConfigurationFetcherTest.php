<?php

namespace Foodlove\AppBundle\Service\ConfigurationFetcher;

use Foodlove\AppBundle\Service\ConfigurationFetcher\LocalConfigurationFetcher;
use Mockery as m;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class LocalConfigurationFetcherTest extends \PHPUnit_Framework_TestCase
{
    const PARAMETER_NAME  = 'some.parameter';
    const PARAMETER_VALUE = 'parameter_value';

    /**
     * @var LocalConfigurationFetcher
     */
    private $localConfigurationFetcher;

    public function setUp()
    {
        $this->localConfigurationFetcher = new LocalConfigurationFetcher();
    }

    /**
     * @expectedException \LogicException
     */
    public function testFetchConfigurationValueThrowsExceptionIfParameterBagIsNotInjected()
    {
        $this->localConfigurationFetcher->fetchConfigurationValue(self::PARAMETER_NAME);
    }

    public function testFetchConfigurationValue()
    {
        /** @var ParameterBagInterface $parameterBag */
        $parameterBag = m::mock(ParameterBagInterface::class);
        $parameterBag->shouldReceive('get')->withArgs([self::PARAMETER_NAME])->andReturn(self::PARAMETER_VALUE);
        $this->localConfigurationFetcher->setParameterBag($parameterBag);

        $value = $this->localConfigurationFetcher->fetchConfigurationValue(self::PARAMETER_NAME);

        $this->assertEquals(self::PARAMETER_VALUE, $value);
    }
}
