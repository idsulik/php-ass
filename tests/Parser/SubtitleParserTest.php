<?php

namespace PhpAss\Tests\Parser;

use PhpAss\Formatter\EventsFormatter;
use PhpAss\Formatter\ScriptInfoFormatter;
use PhpAss\Formatter\StylesFormatter;
use PhpAss\Formatter\SubtitleFormatter;
use PhpAss\Parser\EventsParser;
use PhpAss\Parser\ScriptInfoParser;
use PhpAss\Parser\StylesParser;
use PhpAss\Parser\SubtitleParser;
use PhpAss\Writer\SubtitleWriter;
use PHPUnit\Framework\TestCase;

class SubtitleParserTest extends TestCase
{
    public function testParse(): void
    {
        $parser = new SubtitleParser(
            new ScriptInfoParser(),
            new StylesParser(),
            new EventsParser(),
        );
        $writer = new SubtitleWriter(
            new SubtitleFormatter(
                new ScriptInfoFormatter(),
                new StylesFormatter(),
                new EventsFormatter(),
            )
        );

        $content = file_get_contents(__DIR__ . '/fixtures/example.ass');
        $subtitle = $parser->parseText($content);
        $actual = $writer->generateAssContent($subtitle);

        self::assertEquals($content, $actual);
    }
}