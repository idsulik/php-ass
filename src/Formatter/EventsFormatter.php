<?php

namespace PhpAss\Formatter;

use PhpAss\Model\Event;
use PhpAss\Model\Events;

class EventsFormatter
{
    public function format(Events $events): string
    {
        $content = "[Events]\n";
        $content .= "Format: Layer, Start, End, Style, Name, MarginL, MarginR, MarginV, Effect, Text\n";
        foreach ($events as $event) {
            $content .= $this->formatEvent($event) . "\n";
        }

        return rtrim($content);
    }

    private function formatEvent(Event $event): string
    {
        return sprintf(
            '%s: %s,%s,%s,%s,%s,%s,%s,%s,%s,%s',
            $event->getEventType(),
            $event->getlayer(),
            $event->getStart(),
            $event->getEnd(),
            $event->getStyle(),
            $event->getName(),
            $event->getMarginL(),
            $event->getMarginR(),
            $event->getMarginV(),
            $event->getEffect(),
            $event->getText()
        );
    }
}