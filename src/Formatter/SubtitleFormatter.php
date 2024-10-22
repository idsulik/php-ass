<?php

namespace PhpAss\Formatter;

use PhpAss\Model\Subtitle;

class SubtitleFormatter implements SubtitleFormatterInterface
{
    private ScriptInfoFormatterInterface $scriptInfoFormatter;
    private StylesFormatterInterface $stylesFormatter;
    private EventsFormatterInterface $eventsFormatter;

    public function __construct(
        ScriptInfoFormatterInterface $scriptInfoFormatter = null,
        StylesFormatterInterface $stylesFormatter = null,
        EventsFormatterInterface $eventsFormatter = null
    ) {
        $this->scriptInfoFormatter = $scriptInfoFormatter ?? new ScriptInfoFormatter();
        $this->stylesFormatter = $stylesFormatter ?? new StylesFormatter();
        $this->eventsFormatter = $eventsFormatter ?? new EventsFormatter();
    }

    public function format(Subtitle $subtitle): string
    {
        $content = '';

        // Write Script Info
        $content .= $this->scriptInfoFormatter->format($subtitle->getScriptInfo());
        $content .= "\n";
        $content .= "\n";

        // Write Styles
        $content .= $this->stylesFormatter->format($subtitle->getStyles());
        $content .= "\n";
        $content .= "\n";

        // Write Events
        $content .= $this->eventsFormatter->format($subtitle->getEvents());

        return $content;
    }
}
