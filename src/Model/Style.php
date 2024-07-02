<?php

namespace PhpAss\Model;

class Style
{
    /**
     * Field 1:      Name. The name of the Style. Case sensitive. Cannot include commas.
     * Field 2:      Fontname. The fontname as used by Windows. Case-sensitive.
     * Field 3:      Fontsize.
     * Field 4:      PrimaryColour. A long integer BGR (blue-green-red)  value. ie. the byte order in the hexadecimal
     * equivelent of this number is BBGGRR This is the colour that a subtitle will normally appear in. Field 5:     
     * SecondaryColour. A long integer BGR (blue-green-red)  value. ie. the byte order in the hexadecimal equivelent of
     * this number is BBGGRR This colour may be used instead of the Primary colour when a subtitle is automatically
     * shifted to prevent an onscreen collsion, to distinguish the different subtitles. Field 6:      OutlineColor
     * (TertiaryColour). A long integer BGR (blue-green-red)  value. ie. the byte order in the hexadecimal equivelent
     * of this number is BBGGRR This colour may be used instead of the Primary or Secondary colour when a subtitle is
     * automatically shifted to prevent an onscreen collsion, to distinguish the different subtitles. Field 7:    
     * BackColour. This is the colour of the subtitle outline or shadow, if these are used. A long integer BGR
     * (blue-green-red)  value. ie. the byte order in the hexadecimal equivelent of this number is BBGGRR. Field 4-7: 
     * The color format contains the alpha channel, too. (AABBGGRR) Field 8:      Bold. This defines whether text is bold (true) or not (false). -1 is True, 0 is False. This is independant of the Italic attribute - you can have have text which is both bold and italic. Field 9:      Italic. This defines whether text is italic (true) or not (false). -1 is True, 0 is False. This is independant of the bold attribute - you can have have text which is both bold and italic. Field 9.1:  Underline. [-1 or 0] Field 9.2:  Strikeout. [-1 or 0] Field 9.3:  ScaleX. Modifies the width of the font. [percent] Field 9.4:  ScaleY. Modifies the height of the font. [percent] Field 9.5:  Spacing. Extra space between characters. [pixels] Field 9.6:  Angle.  The origin of the rotation is defined by the alignment. Can be a floating point number. [degrees] Field 10:    BorderStyle. 1=Outline + drop shadow, 3=Opaque box Field 11:    Outline. If BorderStyle is 1,  then this specifies the width of the outline around the text, in pixels. Values may be 0, 1, 2, 3 or 4. Field 12:    Shadow. If BorderStyle is 1,  then this specifies the depth of the drop shadow behind the text, in pixels. Values may be 0, 1, 2, 3 or 4. Drop shadow is always used in addition to an outline - SSA will force an outline of 1 pixel if no outline width is given. Field 13:    Alignment. This sets how text is "justified" within the Left/Right onscreen margins, and also the vertical placing. Values may be 1=Left, 2=Centered, 3=Right. Add 4 to the value for a "Toptitle". Add 8 to the value for a "Midtitle". eg. 5 = left-justified toptitle Field 13:   Alignment, but after the layout of the numpad (1-3 sub, 4-6 mid, 7-9 top). Field 14:    MarginL. This defines the Left Margin in pixels. It is the distance from the left-hand edge of the screen.The three onscreen margins (MarginL, MarginR, MarginV) define areas in which the subtitle text will be displayed. Field 15:    MarginR. This defines the Right Margin in pixels. It is the distance from the right-hand edge of the screen. The three onscreen margins (MarginL, MarginR, MarginV) define areas in which the subtitle text will be displayed. Field 16:    MarginV. This defines the vertical Left Margin in pixels. For a subtitle, it is the distance from the bottom of the screen. For a toptitle, it is the distance from the top of the screen. For a midtitle, the value is ignored - the text will be vertically centred Field 17:    AlphaLevel. This defines the transparency of the text. SSA does not use this yet. Field 17:   Not present in ASS. Field 18:    Encoding. This specifies the font character set or encoding and on multi-lingual Windows installations it provides access to characters used in multiple than one languages. It is usually 0 (zero) for English (Western, ANSI) Windows. When the file is Unicode, this field is useful during file format conversions.
     */

    private const ALIGNMENT_LEFT = 1;

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
     * @var int defines the transparency of the text. SSA does not use this yet.
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
        int $bold,
        int $italic,
        int $underline,
        int $strikeOut,
        int $scaleX,
        int $scaleY,
        int $spacing,
        int $angle,
        int $borderStyle,
        int $outline,
        int $shadow,
        int $alignment,
        int $marginL,
        int $marginR,
        int $marginV,
        int $encoding
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
        return new self(
            $data['Name'],
            $data['Fontname'],
            (int) $data['Fontsize'],
            $data['PrimaryColour'],
            $data['SecondaryColour'],
            $data['OutlineColour'],
            $data['BackColour'],
            (int) $data['Bold'],
            (int) $data['Italic'],
            (int) $data['Underline'],
            (int) $data['StrikeOut'],
            (int) $data['ScaleX'],
            (int) $data['ScaleY'],
            (int) $data['Spacing'],
            (int) $data['Angle'],
            (int) $data['BorderStyle'],
            (int) $data['Outline'],
            (int) $data['Shadow'],
            (int) $data['Alignment'],
            (int) $data['MarginL'],
            (int) $data['MarginR'],
            (int) $data['MarginV'],
            (int) $data['Encoding']
        );
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