<?php

namespace PhpAss\Style;

class ItalicStyle
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = '{\i1}' . $text . '{\i0}';

        return $this;
    }

    public function __toString()
    {
        return $this->text;
    }
}