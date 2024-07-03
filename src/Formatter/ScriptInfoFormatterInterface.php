<?php

namespace PhpAss\Formatter;

use PhpAss\Model\ScriptInfo;

interface ScriptInfoFormatterInterface
{
    public function format(ScriptInfo $scriptInfo): string;
}