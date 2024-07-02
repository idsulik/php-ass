<?php

namespace PhpAss\Formatter;

use PhpAss\Model\Subtitle;

class SubtitleFormatter
{
    private ScriptInfoFormatter $scriptInfoFormatter;
    private StylesFormatter $stylesFormatter;
    private EventsFormatter $eventsFormatter;

    public function __construct(
        ScriptInfoFormatter $scriptInfoFormatter,
        StylesFormatter $stylesFormatter,
        EventsFormatter $eventsFormatter
    ) {
        $this->scriptInfoFormatter = $scriptInfoFormatter;
        $this->stylesFormatter = $stylesFormatter;
        $this->eventsFormatter = $eventsFormatter;
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