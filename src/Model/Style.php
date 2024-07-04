<?php

namespace PhpAss\Model;

class Style
{
    public const ALIGNMENT_BOTTOM_LEFT = 1;

    public const ALIGNMENT_BOTTOM_CENTER = 2;

    public const ALIGNMENT_BOTTOM_RIGHT = 3;

    public const ALIGNMENT_MIDDLE_LEFT = 4;

    public const ALIGNMENT_MIDDLE_CENTER = 5;

    public const ALIGNMENT_MIDDLE_RIGHT = 6;

    public const ALIGNMENT_TOP_LEFT = 7;

    public const ALIGNMENT_TOP_CENTER = 8;

    public const ALIGNMENT_TOP_RIGHT = 9;

    /**
     * @var string name of the Style. case-sensitive. Cannot include commas.
     */
    private string $name;

    /**
     * @var string font name as used by Windows. case-sensitive.
     */
    private string $fontName;

    private int $fontSize;

    /**
     * @var string A long integer BGR (blue-green-red)  value. ie. the byte order in the hexadecimal equivelent of this
     *      number is BBGGRR This is the colour that a subtitle will normally appear in.
     */
    private string $primaryColor;

    /**
     * @var string A long integer BGR (blue-green-red)  value. ie. the byte order in the hexadecimal equivelent of this
     *      number is BBGGRR This colour may be used instead of the Primary colour when a subtitle is automatically
     *      shifted to prevent an onscreen collsion, to distinguish the different subtitles.
     */
    private string $secondaryColor;

    /**
     * @var string A long integer BGR (blue-green-red)  value. ie. the byte order in the hexadecimal equivelent of this
     *      number is BBGGRR This colour may be used instead of the Primary or Secondary colour when a subtitle is
     *      automatically shifted to prevent an onscreen collsion, to distinguish the different subtitles.
     */
    private string $outlineColor;

    /**
     * @var string This is the colour of the subtitle outline or shadow, if these are used. A long integer BGR
     *      (blue-green-red) value. ie. the byte order in the hexadecimal equivelent of this number is BBGGRR.
     */
    private string $backColor;

    /**
     * @var int defines whether text is bold (true) or not (false). -1 is True, 0 is False.
     * This is independant of the Italic attribute - you can have text which is both bold and italic.
     */
    private int $bold;

    /**
     * @var int defines whether text is italic (true) or not (false). -1 is True, 0 is False.
     * This is independant of the bold attribute - you can have text which is both bold and italic.
     */
    private int $italic;

    /**
     * @var int -1 is true, 0 is false
     */
    private int $underline;

    /**
     * @var int -1 is true, 0 is false
     */
    private int $strikeOut;

    /**
     * @var int modifies the width of the font. [percent]
     */
    private int $scaleX;

    /**
     * @var int modifies the height of the font. [percent]
     */
    private int $scaleY;

    /**
     * @var int extra space between characters. [pixels]
     */
    private int $spacing;

    /**
     * @var int origin of the rotation is defined by the alignment. Can be a floating point number. [degrees]
     */
    private int $angle;

    /**
     * @var int 1=Outline + drop shadow, 3=Opaque box
     */
    private int $borderStyle;

    /**
     * @var int if BorderStyle is 1, then this specifies the width of the outline around the text, in pixels.
     */
    private int $outline;

    /**
     * @var int if BorderStyle is 1, then this specifies the depth of the drop shadow behind the text, in pixels.
     */
    private int $shadow;

    /**
     * @var int sets how text is "justified" within the Left/Right onscreen margins, and also the vertical placing.
     * Values may be 1=Left, 2=Centered, 3=Right. Add 4 to the value for a "Toptitle". Add 8 to the value for a
     * "Midtitle". eg. 5 = left-justified toptitle
     */
    private int $alignment;

    /**
     * @var int defines the Left Margin in pixels. It is the distance from the left-hand edge of the screen.
     */
    private int $marginL;

    /**
     * @var int defines the Right Margin in pixels. It is the distance from the right-hand edge of the screen.
     */
    private int $marginR;

    /**
     * @var int defines the vertical Left Margin in pixels.
     * For a subtitle, it is the distance from the bottom of the screen.
     * For a toptitle, it is the distance from the top of the screen.
     * For a midtitle, the value is ignored - the text will be vertically centred
     */
    private int $marginV;

    /**
     * @var int specifies the font character set or encoding and
     * on multi-lingual Windows installations it provides access to characters used in multiple than one languages.
     * It is usually 0 (zero) for English (Western, ANSI) Windows.
     * When the file is Unicode, this field is useful during file format conversions.
     */
    private int $encoding;

    public function __construct(
        string $name,
        string $fontName,
        int $fontSize,
        string $primaryColor,
        string $secondaryColor,
        string $outlineColor,
        string $backColor,
        int $bold = 0,
        int $italic = 0,
        int $underline = 0,
        int $strikeOut = 0,
        int $scaleX = 100,
        int $scaleY = 100,
        int $spacing = 0,
        int $angle = 0,
        int $borderStyle = 0,
        int $outline = 0,
        int $shadow = 0,
        int $alignment = 0,
        int $marginL = 0,
        int $marginR = 0,
        int $marginV = 0,
        int $encoding = 0
    ) {
        $this->name = $name;
        $this->fontName = $fontName;
        $this->fontSize = $fontSize;
        $this->primaryColor = $primaryColor;
        $this->secondaryColor = $secondaryColor;
        $this->outlineColor = $outlineColor;
        $this->backColor = $backColor;
        $this->bold = $bold;
        $this->italic = $italic;
        $this->underline = $underline;
        $this->strikeOut = $strikeOut;
        $this->scaleX = $scaleX;
        $this->scaleY = $scaleY;
        $this->spacing = $spacing;
        $this->angle = $angle;
        $this->borderStyle = $borderStyle;
        $this->outline = $outline;
        $this->shadow = $shadow;
        $this->alignment = $alignment;
        $this->marginL = $marginL;
        $this->marginR = $marginR;
        $this->marginV = $marginV;
        $this->encoding = $encoding;
    }

    public static function fromArray(array $data): self
    {
        $obj = new self(
            $data['Name'],
            $data['Fontname'],
            (int) $data['Fontsize'],
            $data['PrimaryColour'],
            $data['SecondaryColour'],
            $data['OutlineColour'],
            $data['BackColour'],
        );

        if (isset($data['Bold'])) {
            $obj->setBold((int) $data['Bold']);
        }

        if (isset($data['Italic'])) {
            $obj->setItalic((int) $data['Italic']);
        }

        if (isset($data['Underline'])) {
            $obj->setUnderline((int) $data['Underline']);
        }

        if (isset($data['StrikeOut'])) {
            $obj->setStrikeOut((int) $data['StrikeOut']);
        }

        if (isset($data['ScaleX'])) {
            $obj->setScaleX((int) $data['ScaleX']);
        }

        if (isset($data['ScaleY'])) {
            $obj->setScaleY((int) $data['ScaleY']);
        }

        if (isset($data['Spacing'])) {
            $obj->setSpacing((int) $data['Spacing']);
        }

        if (isset($data['Angle'])) {
            $obj->setAngle((int) $data['Angle']);
        }

        if (isset($data['BorderStyle'])) {
            $obj->setBorderStyle((int) $data['BorderStyle']);
        }

        if (isset($data['Outline'])) {
            $obj->setOutline((int) $data['Outline']);
        }

        if (isset($data['Shadow'])) {
            $obj->setShadow((int) $data['Shadow']);
        }

        if (isset($data['Alignment'])) {
            $obj->setAlignment((int) $data['Alignment']);
        }

        if (isset($data['MarginL'])) {
            $obj->setMarginL((int) $data['MarginL']);
        }

        if (isset($data['MarginR'])) {
            $obj->setMarginR((int) $data['MarginR']);
        }

        if (isset($data['MarginV'])) {
            $obj->setMarginV((int) $data['MarginV']);
        }

        if (isset($data['Encoding'])) {
            $obj->setEncoding((int) $data['Encoding']);
        }

        return $obj;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFontName(): string
    {
        return $this->fontName;
    }

    public function setFontName(string $fontName): void
    {
        $this->fontName = $fontName;
    }

    public function getFontSize(): int
    {
        return $this->fontSize;
    }

    public function setFontSize(int $fontSize): void
    {
        $this->fontSize = $fontSize;
    }

    public function getPrimaryColor(): string
    {
        return $this->primaryColor;
    }

    public function setPrimaryColor(string $primaryColor): void
    {
        $this->primaryColor = $primaryColor;
    }

    public function getSecondaryColor(): string
    {
        return $this->secondaryColor;
    }

    public function setSecondaryColor(string $secondaryColor): void
    {
        $this->secondaryColor = $secondaryColor;
    }

    public function getOutlineColor(): string
    {
        return $this->outlineColor;
    }

    public function setOutlineColor(string $outlineColor): void
    {
        $this->outlineColor = $outlineColor;
    }

    public function getBackColor(): string
    {
        return $this->backColor;
    }

    public function setBackColor(string $backColor): void
    {
        $this->backColor = $backColor;
    }

    public function getBold(): int
    {
        return $this->bold;
    }

    public function setBold(int $bold): void
    {
        $this->bold = $bold;
    }

    public function getItalic(): int
    {
        return $this->italic;
    }

    public function setItalic(int $italic): void
    {
        $this->italic = $italic;
    }

    public function getUnderline(): int
    {
        return $this->underline;
    }

    public function setUnderline(int $underline): void
    {
        $this->underline = $underline;
    }

    public function getStrikeOut(): int
    {
        return $this->strikeOut;
    }

    public function setStrikeOut(int $strikeOut): void
    {
        $this->strikeOut = $strikeOut;
    }

    public function getScaleX(): int
    {
        return $this->scaleX;
    }

    public function setScaleX(int $scaleX): void
    {
        $this->scaleX = $scaleX;
    }

    public function getScaleY(): int
    {
        return $this->scaleY;
    }

    public function setScaleY(int $scaleY): void
    {
        $this->scaleY = $scaleY;
    }

    public function getSpacing(): int
    {
        return $this->spacing;
    }

    public function setSpacing(int $spacing): void
    {
        $this->spacing = $spacing;
    }

    public function getAngle(): int
    {
        return $this->angle;
    }

    public function setAngle(int $angle): void
    {
        $this->angle = $angle;
    }

    public function getBorderStyle(): int
    {
        return $this->borderStyle;
    }

    public function setBorderStyle(int $borderStyle): void
    {
        $this->borderStyle = $borderStyle;
    }

    public function getOutline(): int
    {
        return $this->outline;
    }

    public function setOutline(int $outline): void
    {
        $this->outline = $outline;
    }

    public function getShadow(): int
    {
        return $this->shadow;
    }

    public function setShadow(int $shadow): void
    {
        $this->shadow = $shadow;
    }

    public function getAlignment(): int
    {
        return $this->alignment;
    }

    public function setAlignment(int $alignment): void
    {
        $this->alignment = $alignment;
    }

    public function getMarginL(): int
    {
        return $this->marginL;
    }

    public function setMarginL(int $marginL): void
    {
        $this->marginL = $marginL;
    }

    public function getMarginR(): int
    {
        return $this->marginR;
    }

    public function setMarginR(int $marginR): void
    {
        $this->marginR = $marginR;
    }

    public function getMarginV(): int
    {
        return $this->marginV;
    }

    public function setMarginV(int $marginV): void
    {
        $this->marginV = $marginV;
    }

    public function getEncoding(): int
    {
        return $this->encoding;
    }

    public function setEncoding(int $encoding): void
    {
        $this->encoding = $encoding;
    }
}
