<?php

namespace PhpAss\Parser;

use PhpAss\Model\Subtitle;

interface SubtitleParserInterface
{
    public function parseText(string $text): Subtitle;
}