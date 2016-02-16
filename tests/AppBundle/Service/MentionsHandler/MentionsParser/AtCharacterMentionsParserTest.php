<?php

namespace Foodlove\AppBundle\Service\MentionsHandler\MentionsParser;

class AtCharacterMentionsParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AtCharacterMentionsParser
     */
    private $mentionsParser;

    public function setUp()
    {
        $this->mentionsParser = new AtCharacterMentionsParser();
    }

    /**
     * @dataProvider providerFindMentions
     */
    public function testFindMentions($text, $expectedMentions)
    {
        $foundMentions = $this->mentionsParser->findMentions($text);

        $this->assertEquals($expectedMentions, $foundMentions);
    }

    public function providerFindMentions()
    {
        return [
            ['No mentions in here', []],
            ['One @mention in there', ['mention']],
            ['Someone called @you and @you and @youtoo', ['you', 'youtoo']],
            ['I have mentioned about @someone@you@andyou @peter', ['someone', 'you', 'andyou', 'peter']],
            ['Mentioned about @@@tripleat@', ['tripleat']]
        ];
    }
}
