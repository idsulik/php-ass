<?php

namespace PhpAss\Formatter;

use PhpAss\Model\Styles;

interface StylesFormatterInterface
{
    public function format(Styles $styles): string;
}