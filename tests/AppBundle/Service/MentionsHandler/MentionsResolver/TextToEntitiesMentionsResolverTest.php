<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsResolver;

use Foodlove\AppBundle\Dto\Dto\ConfirmedMentionDto;
use Foodlove\AppBundle\Entity\Mention;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsFetcher;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsMapper;
use Foodlove\AppBundle\Service\MentionsHandler\MentionsParser;
use Mockery as m;

class TextToEntitiesMentionsResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TextToEntitiesMentionsResolver
     */
    private $mentionsResolver;

    /**
     * @var MentionsParser
     */
    private $mentionsParser;

    /**
     * @var MentionsFetcher
     */
    private $mentionsFetcher;

    /**
     * @var MentionsMapper
     */
    private $mentionsMapper;

    public function setUp()
    {
        $this->mentionsParser = m::mock(MentionsParser::class);
        $this->mentionsFetcher = m::mock(MentionsFetcher::class);
        $this->mentionsMapper = m::mock(MentionsMapper::class);

        $this->mentionsResolver = new TextToEntitiesMentionsResolver(
            $this->mentionsParser,
            $this->mentionsFetcher,
            $this->mentionsMapper
        );
    }

    public function testGetMentions()
    {
        $fooBarUsernames = ['foo', 'bar'];
        $fooBarDto = [m::mock(ConfirmedMentionDto::class), m::mock(ConfirmedMentionDto::class)];
        $fooBarEntities = [m::mock(Mention::class), m::mock(Mention::class)];

        $this->mentionsParser->shouldReceive('findMentions')->with('Hello @foo and @bar')->once()
            ->andReturn($fooBarUsernames);
        $this->mentionsFetcher->shouldReceive('fetchMentions')->with($fooBarUsernames)->once()
            ->andReturn($fooBarDto);
        $this->mentionsMapper->shouldReceive('map')->with($fooBarDto)->once()->andReturn($fooBarEntities);

        $entities = $this->mentionsResolver->getMentions('Hello @foo and @bar');

        $this->assertEquals($fooBarEntities, $entities);
    }
}
