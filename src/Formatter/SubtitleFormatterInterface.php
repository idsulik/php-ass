<?php

namespace PhpAss\Formatter;

use PhpAss\Model\Subtitle;

interface SubtitleFormatterInterface
{
    public function format(Subtitle $subtitle): string;
}