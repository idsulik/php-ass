<?php

namespace PhpAss\Model;

class Duration
{
    private int $hours;
    private int $minutes;
    private int $seconds;
    private int $tenths;

    public static function fromString(string $duration): self
    {
        $parts = explode(':', $duration);
        $hours = (int) $parts[0];
        $minutes = (int) $parts[1];
        [$seconds, $tenths] = explode('.', $parts[2]);

        return new self($hours, $minutes, $seconds, $tenths);
    }

    public static function fromSeconds(float $seconds): self
    {
        $roundedSeconds = floor($seconds * 10);

        $hours = (int) floor($roundedSeconds / 36000);
        $minutes = (int) floor(($roundedSeconds % 36000) / 600);
        $seconds = (int) floor(($roundedSeconds % 600) / 10);
        $tenths = $roundedSeconds % 10;

        return new self($hours, $minutes, $seconds, $tenths);
    }

    public function __construct(int $hours, int $minutes, int $seconds, int $tenths)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
        $this->tenths = $tenths;
    }

    public function getHours(): int
    {
        return $this->hours;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }

    public function getSeconds(): int
    {
        return $this->seconds;
    }

    public function getTenths(): int
    {
        return $this->tenths;
    }

    public function __toString(): string
    {
        return sprintf(
            '%d:%02d:%02d.%02d',
            $this->hours,
            $this->minutes,
            $this->seconds,
            $this->tenths
        );
    }
}
