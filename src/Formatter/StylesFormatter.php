<?php

namespace PhpAss\Formatter;

use PhpAss\Model\Style;
use PhpAss\Model\Styles;

class StylesFormatter implements StylesFormatterInterface
{
    public function format(Styles $styles): string
    {
        $content = "[V4+ Styles]\n";
        $content .= "Format: Name, Fontname, Fontsize, PrimaryColour, SecondaryColour, OutlineColour, BackColour, Bold, Italic, Underline, StrikeOut, ScaleX, ScaleY, Spacing, Angle, BorderStyle, Outline, Shadow, Alignment, MarginL, MarginR, MarginV, Encoding\n";
        foreach ($styles as $style) {
            $content .= $this->formatStyle($style) . "\n";
        }

        return rtrim($content);
    }

    private function formatStyle(Style $style): string
    {
        return sprintf(
            'Style: %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s',
            $style->getName(),
            $style->getFontName(),
            $style->getFontSize(),
            $style->getPrimaryColor(),
            $style->getSecondaryColor(),
            $style->getOutlineColor(),
            $style->getBackColor(),
            $style->getBold(),
            $style->getItalic(),
            $style->getUnderline(),
            $style->getStrikeOut(),
            $style->getScaleY(),
            $style->getScaleY(),
            $style->getSpacing(),
            $style->getAngle(),
            $style->getBorderStyle(),
            $style->getOutline(),
            $style->getShadow(),
            $style->getAlignment(),
            $style->getMarginL(),
            $style->getMarginR(),
            $style->getMarginV(),
            $style->getEncoding()
        );
    }
}