<?php

namespace PhpAss\Tests\Formatter;

use PhpAss\Formatter\StylesFormatter;
use PhpAss\Parser\StylesParser;
use PHPUnit\Framework\TestCase;

class StylesFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $parser = new StylesParser();
        $lines = [
            'Format: Name, Fontname, Fontsize, PrimaryColour, SecondaryColour, OutlineColour, BackColour, Bold, Italic, Underline, StrikeOut, ScaleX, ScaleY, Spacing, Angle, BorderStyle, Outline, Shadow, Alignment, MarginL, MarginR, MarginV, Encoding',
            'Style: Default,Arial,20,&H00FFFFFF,&H000000FF,&H00000000,&H00000000,0,0,0,0,100,100,0,0,1,2,2,2,10,10,10,0',
            'Style: Alt,Times New Roman,40,&H00FFFFFF,&H000000FF,&H00000000,&H00000000,0,0,0,0,100,100,0,0,1,2,2,8,10,10,10,0',
        ];
        $styles = $parser->parse($lines);
        $formatted = (new StylesFormatter())->format($styles);

        self::assertEquals("[V4+ Styles]\n" . implode("\n", $lines), $formatted);
    }
}