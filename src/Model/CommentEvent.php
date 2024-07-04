<?php

namespace PhpAss\Model;

class CommentEvent extends Event
{
    public const EVENT_TYPE = 'Comment';

    public static function getEventType(): string
    {
        return self::EVENT_TYPE;
    }

    public static function fromArray(array $eventData): self
    {
        return new self(
            (int) $eventData['Layer'],
            Duration::fromString($eventData['Start']),
            Duration::fromString($eventData['End']),
            $eventData['Style'],
            $eventData['Name'],
            $eventData['Text'],
            $eventData['MarginL'] ?? null,
            $eventData['MarginR'] ?? null,
            $eventData['MarginV'] ?? null,
            $eventData['Effect'] ?? null,
        );
    }
}