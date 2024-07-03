<?php

namespace PhpAss\Formatter;

use PhpAss\Model\ScriptInfo;

class ScriptInfoFormatter implements ScriptInfoFormatterInterface
{
    public function format(ScriptInfo $scriptInfo): string
    {
        return sprintf(
            "[Script Info]\nTitle: %s\nScriptType: %s\nWrapStyle: %s\nPlayResX: %s\nPlayResY: %s\nScaledBorderAndShadow: %s\nLast Style Storage: %s\nVideo File: %s\nVideo Aspect Ratio: %s\nVideo Zoom: %s\nVideo Position: %s",
            $scriptInfo->getTitle(),
            $scriptInfo->getScriptType(),
            $scriptInfo->getWrapStyle(),
            $scriptInfo->getPlayResX(),
            $scriptInfo->getPlayResY(),
            $scriptInfo->getScaledBorderAndShadow(),
            $scriptInfo->getLastStyleStorage(),
            $scriptInfo->getVideoFile(),
            $scriptInfo->getVideoAspectRatio(),
            $scriptInfo->getVideoZoom(),
            $scriptInfo->getVideoPosition(),
        );
    }
}