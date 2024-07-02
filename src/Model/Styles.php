<?php

namespace PhpAss\Model;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class Styles implements IteratorAggregate
{
    private array $styles;

    public function __construct(Style ...$styles)
    {
        $this->styles = $styles;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->styles);
    }
}