<?php

namespace PhpAss\Parser;

use PhpAss\Model\Subtitle;

class SubtitleParser implements SubtitleParserInterface
{
    private ScriptInfoParser $scriptInfoParser;
    private StylesParser $stylesParser;
    private EventsParser $eventsParser;

    public function __construct(
        ScriptInfoParser $scriptInfoParser,
        StylesParser $stylesParser,
        EventsParser $eventsParser
    ) {
        $this->scriptInfoParser = $scriptInfoParser;
        $this->stylesParser = $stylesParser;
        $this->eventsParser = $eventsParser;
    }

    public function parseText(string $text): Subtitle
    {
        $lines = explode("\n", $text);
        $sectionLines = [];
        $currentSection = null;
        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line) || $line[0] === ';') {
                continue; // Skip empty lines and comments
            }

            if ($line[0] === '[' && substr($line, -1) === ']') {
                // Start of a new section
                $currentSection = substr($line, 1, -1);
                continue;
            }

            $sectionLines[$currentSection][] = $line;
        }

        $scriptInfo = null;
        $styles = null;
        $events = null;
        foreach ($sectionLines as $section => $lines) {
            switch ($section) {
                case ScriptInfoParser::SECTION_NAME:
                    $scriptInfo = $this->scriptInfoParser->parse($lines);
                    break;
                case StylesParser::SECTION_NAME:
                    $styles = $this->stylesParser->parse($lines);
                    break;
                case EventsParser::SECTION_NAME:
                    $events = $this->eventsParser->parse($lines);
                    break;
            }
        }

        return new Subtitle(
            $scriptInfo,
            $styles,
            $events,
        );
    }
}