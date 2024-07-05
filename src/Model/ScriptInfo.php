<?php

namespace PhpAss\Model;

use ArrayAccess;

class ScriptInfo implements ArrayAccess
{
    /**
     * @var int smart wrapping, lines are evenly broken
     */
    public const WRAP_STYLE_SMART = 0;

    /**
     * @var int end-of-line word wrapping, only \N breaks
     */
    public const WRAP_STYLE_EOL = 1;

    /**
     * @var int no word wrapping, \n \N both breaks
     */
    public const WRAP_STYLE_NONE = 2;

    /**
     * @var int same as 0, but lower line gets wider.
     */
    public const WRAP_STYLE_SMART_LOWER = 3;

    /**
     * @var string description of the script
     */
    private string $title;

    /**
     * @var string SSA script format version eg. "V4.00".
     * It is used by SSA to give a warning if you are using a version of SSA older than the version that created the
     * script
     */
    private string $scriptType;

    /**
     * @var int|null default wrapping style
     */
    private ?int $wrapStyle;

    /**
     * @var int|null width of the screen used by the script's author(s) when playing the script
     */
    private ?int $playResX;

    /**
     * @var int|null height of the screen used by the script's author(s) when playing the script
     */
    private ?int $playResY;

    private ?string $scaledBorderAndShadow;
    private ?string $lastStyleStorage;
    private ?string $videoFile;
    private ?int $videoAspectRatio;
    private ?int $videoZoom;
    private ?int $videoPosition;

    public function __construct(
        ?string $title,
        string $scriptType,
        ?int $wrapStyle = null,
        ?int $playResX = null,
        ?int $playResY = null,
        ?string $scaledBorderAndShadow = null,
        ?string $lastStyleStorage = null,
        ?string $videoFile = null,
        ?int $videoAspectRatio = null,
        ?int $videoZoom = null,
        ?int $videoPosition = null
    ) {
        $this->title = $title ?? '<untitled>';
        $this->scriptType = $scriptType;
        $this->wrapStyle = $wrapStyle;
        $this->playResX = $playResX;
        $this->playResY = $playResY;
        $this->scaledBorderAndShadow = $scaledBorderAndShadow;
        $this->lastStyleStorage = $lastStyleStorage;
        $this->videoFile = $videoFile;
        $this->videoAspectRatio = $videoAspectRatio;
        $this->videoZoom = $videoZoom;
        $this->videoPosition = $videoPosition;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['Title'] ?? '',
            $data['ScriptType'] ?? '',
            $data['WrapStyle'] ?? null,
            $data['PlayResX'] ?? null,
            $data['PlayResY'] ?? null,
            $data['ScaledBorderAndShadow'] ?? null,
                $data['Last Style Storage'] ?? null,
                $data['Video File'] ?? null,
                $data['Video Aspect Ratio'] ?? null,
                $data['Video Zoom'] ?? null,
                $data['Video Position'] ?? null
        );
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getScriptType(): string
    {
        return $this->scriptType;
    }

    public function getWrapStyle(): ?int
    {
        return $this->wrapStyle;
    }

    public function getPlayResX(): ?int
    {
        return $this->playResX;
    }

    public function getPlayResY(): ?int
    {
        return $this->playResY;
    }

    public function getScaledBorderAndShadow(): ?string
    {
        return $this->scaledBorderAndShadow;
    }

    public function getLastStyleStorage(): ?string
    {
        return $this->lastStyleStorage;
    }

    public function getVideoFile(): ?string
    {
        return $this->videoFile;
    }

    public function getVideoAspectRatio(): ?int
    {
        return $this->videoAspectRatio;
    }

    public function getVideoZoom(): ?int
    {
        return $this->videoZoom;
    }

    public function getVideoPosition(): ?int
    {
        return $this->videoPosition;
    }

    public function offsetExists($offset): bool
    {
        return property_exists($this, $offset);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    public function offsetSet($offset, $value): void
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->$offset);
    }
}