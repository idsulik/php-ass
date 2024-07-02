<?php

namespace PhpAss\Parser;

use Exception;
use PhpAss\Model\Style;
use PhpAss\Model\Styles;

class StylesParser extends Exception
{
    public const SECTION_NAME = 'V4+ Styles';

    /**
     * @param string[] $lines
     */
    public function parse(array $lines): Styles
    {
        $fields = array_map('trim', explode(',', substr($lines[0], 7)));
        $styles = [];
        foreach ($lines as $line) {
            if (strpos($line, 'Style:') === 0) {
                $values = array_map('trim', explode(',', substr($line, 6)));
                $styleData = array_combine($fields, $values);
                $styles[] = Style::fromArray($styleData);
            }
        }

        return new Styles(...$styles);
    }
}