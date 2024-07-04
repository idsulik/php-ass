<?php

namespace PhpAss\Model;

class Duration
{
    private int $hours;
    private int $minutes;
    private int $seconds;
    private int $milliseconds;

    public static function fromString(string $duration): self
    {
        $parts = explode(':', $duration);
        $hours = (int) $parts[0];
        $minutes = (int) $parts[1];
        [$seconds, $milliseconds] = explode('.', $parts[2]);

        return new self($hours, $minutes, $seconds, $milliseconds);
    }

    public static function fromSeconds(float $seconds): self
    {
        $milliseconds = (int) round(($seconds - floor($seconds)) * 1000);
        $time = round($seconds);
        $hours = (int) floor($time / 3600);
        $minutes = (int) floor(($time % 3600) / 60);
        $seconds = (int) floor($time % 60);

        return new self($hours, $minutes, $seconds, $milliseconds);
    }

    public function __construct(int $hours, int $minutes, int $seconds, int $milliseconds)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
        $this->milliseconds = $milliseconds;
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

    public function getMilliseconds(): int
    {
        return $this->milliseconds;
    }

    public function __toString(): string
    {
        return sprintf(
            '%d:%02d:%02d.%02d',
            $this->hours,
            $this->minutes,
            $this->seconds,
            $this->milliseconds
        );
    }
}
