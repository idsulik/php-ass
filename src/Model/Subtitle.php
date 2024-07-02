<?php

namespace PhpAss\Model;

class Subtitle
{
    private ScriptInfo $scriptInfo;
    private Styles $styles;
    private Events $events;

    public function __construct(ScriptInfo $scriptInfo, Styles $styles, Events $events)
    {
        $this->scriptInfo = $scriptInfo;
        $this->styles = $styles;
        $this->events = $events;
    }

    public function getScriptInfo(): ScriptInfo
    {
        return $this->scriptInfo;
    }

    public function getStyles(): Styles
    {
        return $this->styles;
    }

    public function getEvents(): Events
    {
        return $this->events;
    }
}