<?php

namespace PhpAss\Model;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class Events implements IteratorAggregate
{
    private array $events;

    public function __construct(Event ...$events)
    {
        $this->events = $events;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->events);
    }
}