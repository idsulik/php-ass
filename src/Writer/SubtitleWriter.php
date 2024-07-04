<?php

namespace PhpAss\Writer;

use PhpAss\Formatter\SubtitleFormatter;
use PhpAss\Formatter\SubtitleFormatterInterface;
use PhpAss\Model\Subtitle;

class SubtitleWriter
{
    private SubtitleFormatterInterface $subtitleFormatter;

    public function __construct(
        ?SubtitleFormatterInterface $subtitleFormatter = null
    ) {
        $this->subtitleFormatter = $subtitleFormatter ?? new SubtitleFormatter();
    }

    public function generateAssContent(Subtitle $subtitle): string
    {
        return $this->subtitleFormatter->format($subtitle);
    }
}