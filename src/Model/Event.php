<?php

namespace PhpAss\Model;

abstract class Event
{
    private int $layer;
    private Duration $start;
    private Duration $end;
    private string $style;
    private string $name;
    private ?string $marginL;
    private ?string $marginR;
    private ?string $marginV;
    private ?string $effect;
    private string $text;

    public function __construct(
        int $layer,
        Duration $start,
        Duration $end,
        string $style,
        string $name,
        ?string $marginL,
        ?string $marginR,
        ?string $marginV,
        ?string $effect,
        string $text
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