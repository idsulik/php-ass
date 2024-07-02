<?php

namespace PhpAss\Parser;

use Exception;
use PhpAss\Model\CommentEvent;
use PhpAss\Model\DialogueEvent;
use PhpAss\Model\Events;

class EventsParser extends Exception
{
    public const SECTION_NAME = 'Events';

    /**
     * @param string[] $lines
     */
    public function parse(array $lines): Events
    {
        $fields = array_map('trim', explode(',', substr($lines[0], 8)));

        $events = [];
        foreach ($lines as $line) {
            if (strpos($line, DialogueEvent::EVENT_TYPE . ':') === 0) {
                $values = explode(',', substr($line, 9), 10);

                $eventData = array_combine($fields, $values);
                $events[] = DialogueEvent::fromArray($eventData);
            } elseif (strpos($line, CommentEvent::EVENT_TYPE . ':') === 0) {
                $values = explode(',', substr($line, 8), 10);

                $eventData = array_combine($fields, $values);
                $events[] = CommentEvent::fromArray($eventData);
            }
        }

        return new Events(...$events);
    }
}