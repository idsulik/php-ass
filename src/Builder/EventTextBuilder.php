<?php

namespace PhpAss\Builder;

use PhpAss\Style\BoldStyle;
use PhpAss\Style\ItalicStyle;
use PhpAss\Style\StrikeoutStyle;
use PhpAss\Style\UnderlineStyle;

class EventTextBuilder
{
    private string $text = '';

    public function addPlainText(string $text): EventTextBuilder
    {
        $this->text .= $text;

        return $this;
    }

    public function addBoldText(string $text): EventTextBuilder
    {
        $this->text .= new BoldStyle($text);

        return $this;
    }

    public function addItalicText(string $text): EventTextBuilder
    {
        $this->text .= new ItalicStyle($text);

        return $this;
    }

    public function addUnderlineText(string $text): EventTextBuilder
    {
        $this->text .= new UnderlineStyle($text);

        return $this;
    }

    public function addStrikeoutText(string $text): EventTextBuilder
    {
        $this->text .= new StrikeoutStyle($text);

        return $this;
    }

    public function addFont(string $font): EventTextBuilder
    {
        $this->text .= '{\fn' . htmlspecialchars($font, ENT_QUOTES, 'UTF-8') . '}';

        return $this;
    }

    public function addFontSize(int $size): EventTextBuilder
    {
        $this->text .= '{\fs' . $size . '}';

        return $this;
    }

    public function addPrimaryColor(string $color): EventTextBuilder
    {
        $this->text .= '{\c&H' . strtoupper($color) . '&}';

        return $this;
    }

    public function addSecondaryColor(string $color): EventTextBuilder
    {
        $this->text .= '{\2c&H' . strtoupper($color) . '&}';

        return $this;
    }

    public function addOutlineColor(string $color): EventTextBuilder
    {
        $this->text .= '{\3c&H' . strtoupper($color) . '&}';

        return $this;
    }

    public function addBackColor(string $color): EventTextBuilder
    {
        $this->text .= '{\4c&H' . strtoupper($color) . '&}';

        return $this;
    }

    public function addOutline(int $size): EventTextBuilder
    {
        $this->text .= '{\bord' . $size . '}';

        return $this;
    }

    public function addShadow(int $size): EventTextBuilder
    {
        $this->text .= '{\shad' . $size . '}';

        return $this;
    }

    public function addAlignment(int $alignment): EventTextBuilder
    {
        $this->text .= '{\an' . $alignment . '}';

        return $this;
    }

    public function addPosition(float $x, float $y): EventTextBuilder
    {
        $this->text .= '{\pos(' . $x . ',' . $y . ')}';

        return $this;
    }

    public function addMove(
        float $x1,
        float $y1,
        float $x2,
        float $y2,
        ?int $t1 = null,
        ?int $t2 = null
    ): EventTextBuilder {
        $this->text .= '{\move(' . $x1 . ',' . $y1 . ',' . $x2 . ',' . $y2;
        if ($t1 !== null && $t2 !== null) {
            $this->text .= ',' . $t1 . ',' . $t2;
        }
        $this->text .= ')}';

        return $this;
    }

    public function addFade(int $a1, int $a2, int $a3, int $t1, int $t2, int $t3, int $t4): EventTextBuilder
    {
        $this->text .= '{\fade(' . $a1 . ',' . $a2 . ',' . $a3 . ',' . $t1 . ',' . $t2 . ',' . $t3 . ',' . $t4 . ')}';

        return $this;
    }

    public function addTransition(int $t1, int $t2, string $command): EventTextBuilder
    {
        $this->text .= '{\t(' . $t1 . ',' . $t2 . ',' . $command . ')}';

        return $this;
    }

    public function resetStyle(): EventTextBuilder
    {
        $this->text .= '{\r}';

        return $this;
    }

    public function build(): string
    {
        return $this->text;
    }
}