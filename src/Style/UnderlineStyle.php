<?php

namespace PhpAss\Style;

class UnderlineStyle
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = '{\u1}' . $text . '{\u0}';
    }

    public function __toString()
    {
        return $this->text;
    }
}