<?php

namespace PhpAss\Model;

abstract class Event
{
    /**
     * @var int layer (any integer) subtitles having different layer number will be ignored during the collusion
     *      detection. Higher numbered layers will be drawn over the lower numbered.
     */
    private int $layer;

    /**
     * @var Duration start time of the event, in 0:00:00:00 format ie. Hrs:Mins:Secs:hundredths.
     */
    private Duration $start;

    /**
     * @var Duration end time of the event, in 0:00:00:00 format ie. Hrs:Mins:Secs:hundredths.
     */
    private Duration $end;

    /**
     * @var string style name. If it is "Default", then your own *Default style will be subtituted.
     */
    private string $style;

    /**
     * @var string character name. This is the name of the character who speaks the dialogue.
     */
    private string $name;

    /**
     * @var string|null 4-figure left margin override. The values are in pixels.
     */
    private ?string $marginL;

    /**
     * @var string|null 4-figure right margin override. The values are in pixels.
     */
    private ?string $marginR;

    /**
     * @var string|null 4-figure bottom margin override. The values are in pixels.
     */
    private ?string $marginV;

    /**
     * @var string|null transition effect. This is either empty,
     * or contains information for one of the three transition effects implemented in SSA v4.x
     */
    private ?string $effect;

    /**
     * @var string subtitle text. This is the actual text which will be displayed as a subtitle onscreen.
     */
    private string $text;

    public function __construct(
        int $layer,
        Duration $start,
        Duration $end,
        string $style,
        string $name,
        string $text,
        ?string $marginL = '0000',
        ?string $marginR = '0000',
        ?string $marginV = '0000',
        ?string $effect = null
    ) {
        $this->layer = $layer;
        $this->start = $start;
        $this->end = $end;
        $this->style = $style;
        $this->name = $name;
        $this->marginL = $marginL;
        $this->marginR = $marginR;
        $this->marginV = $marginV;
        $this->effect = $effect;
        $this->text = $text;
    }

    public abstract static function getEventType(): string;

    public function getLayer(): int
    {
        return $this->layer;
    }

    public function getStart(): Duration
    {
        return $this->start;
    }

    public function getEnd(): Duration
    {
        return $this->end;
    }

    public function getStyle(): string
    {
        return $this->style;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMarginL(): ?string
    {
        return $this->marginL;
    }

    public function getMarginR(): ?string
    {
        return $this->marginR;
    }

    public function getMarginV(): ?string
    {
        return $this->marginV;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
