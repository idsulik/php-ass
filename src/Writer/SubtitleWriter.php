<?php

namespace PhpAss\Writer;

use PhpAss\Formatter\SubtitleFormatter;
use PhpAss\Model\Subtitle;

class SubtitleWriter
{
    private SubtitleFormatter $subtitleFormatter;

    public function __construct(SubtitleFormatter $subtitleFormatter)
    {
        $this->subtitleFormatter = $subtitleFormatter;
    }

    public function generateAssContent(Subtitle $subtitle): string
    {
        return $this->subtitleFormatter->format($subtitle);
    }
}