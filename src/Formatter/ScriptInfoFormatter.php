<?php

namespace PhpAss\Formatter;

use PhpAss\Model\ScriptInfo;

class ScriptInfoFormatter implements ScriptInfoFormatterInterface
{
    public function format(ScriptInfo $scriptInfo): string
    {
        $content = sprintf(
            "[Script Info]\nTitle: %s\nScriptType: %s\nWrapStyle: %s\nPlayResX: %s\nPlayResY: %s",
            $scriptInfo->getTitle(),
            $scriptInfo->getScriptType(),
            $scriptInfo->getWrapStyle(),
            $scriptInfo->getPlayResX(),
            $scriptInfo->getPlayResY(),
        );

        if ($scriptInfo->getScaledBorderAndShadow() !== null) {
            $content .= sprintf("\nScaledBorderAndShadow: %s", $scriptInfo->getScaledBorderAndShadow());
        }

        if ($scriptInfo->getLastStyleStorage() !== null) {
            $content .= sprintf("\nLast Style Storage: %s", $scriptInfo->getLastStyleStorage());
        }

        if ($scriptInfo->getVideoFile() !== null) {
            $content .= sprintf("\nVideo File: %s", $scriptInfo->getVideoFile());
        }

        if ($scriptInfo->getVideoAspectRatio() !== null) {
            $content .= sprintf("\nVideo Aspect Ratio: %s", $scriptInfo->getVideoAspectRatio());
        }

        if ($scriptInfo->getVideoZoom() !== null) {
            $content .= sprintf("\nVideo Zoom: %s", $scriptInfo->getVideoZoom());
        }

        if ($scriptInfo->getVideoPosition() !== null) {
            $content .= sprintf("\nVideo Position: %s", $scriptInfo->getVideoPosition());
        }

        return $content;
    }
}