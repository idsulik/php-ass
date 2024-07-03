<?php

namespace PhpAss\Formatter;

use PhpAss\Model\Events;

interface EventsFormatterInterface
{
    public function format(Events $events): string;
}