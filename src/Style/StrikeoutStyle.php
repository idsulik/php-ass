<?php

namespace PhpAss\Style;

class StrikeoutStyle
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = '{\s1}' . $text . '{\s0}';

        return $this;
    }

    public function __toString(): string
    {
        return $this->text;
    }
}