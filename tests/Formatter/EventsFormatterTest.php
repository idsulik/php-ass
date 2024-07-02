<?php

namespace PhpAss\Tests\Formatter;

use PhpAss\Formatter\EventsFormatter;
use PhpAss\Parser\EventsParser;
use PHPUnit\Framework\TestCase;

class EventsFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $parser = new EventsParser();
        $lines = [
            'Format: Layer, Start, End, Style, Name, MarginL, MarginR, MarginV, Effect, Text',
            'Dialogue: 0,0:00:00.00,0:00:05.00,Default,,0000,0000,0000,,This is a test of the ASS format and some basic features in it.',
            'Dialogue: 0,0:00:05.00,0:00:07.00,Default,,0000,0000,0000,,This and the previous line should both show at the bottom of the video in 20 pixel high white Arial with a 2 pixel black outline and 2 pixel offset shadow. This line is long so it should automatically be broken into several lines that are approximately even length, with upper lines being longer.',
        ];
        $events = $parser->parse($lines);
        $formatted = (new EventsFormatter())->format($events);

        self::assertEquals("[Events]\n" . implode("\n", $lines), $formatted);
    }
}