<?php

namespace PhpAss\Style;

class BoldStyle
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = '{\b1}' . $text . '{\b0}';

        return $this;
    }

    public function __toString()
    {
        return $this->text;
    }
}