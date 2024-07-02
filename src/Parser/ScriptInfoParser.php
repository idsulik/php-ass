<?php

namespace PhpAss\Parser;

use Exception;
use PhpAss\Model\ScriptInfo;

class ScriptInfoParser extends Exception
{
    public const SECTION_NAME = 'Script Info';

    /**
     * @param string[] $lines
     */
    public function parse(array $lines): ScriptInfo
    {
        return ScriptInfo::fromArray($this->parseLines($lines));
    }

    private function parseLines(array $lines): array
    {
        $data = [];
        foreach ($lines as $line) {
            [$key, $value] = explode(':', $line, 2);
            $data[trim($key)] = trim($value);
        }

        return $data;
    }
}