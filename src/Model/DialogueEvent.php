<?php

namespace PhpAss\Model;

class DialogueEvent extends Event
{
    public const EVENT_TYPE = 'Dialogue';

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
            $eventData['MarginL'] ?? '0000',
            $eventData['MarginR'] ?? '0000',
            $eventData['MarginV'] ?? '0000',
            $eventData['Effect'] ?? null,
        );
    }
}
