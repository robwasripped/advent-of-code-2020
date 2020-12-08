<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day08;

class HandheldHalting
{
    public function getAccumulatorValueBeforeLoop(string $commandsString): int
    {
        $commands = \explode("\n", $commandsString);
        $visitedIndices = [];
        $accumulator = 0;

        $i = 0;
        while(!\in_array($i, $visitedIndices)) {
            $visitedIndices[] = $i;

            list($command, $value) = \explode(' ', $commands[$i]);

            switch ($command) {
                case 'jmp':
                    $i += (int) $value;
                    break;
                case 'acc':
                    $accumulator += (int) $value;
                default:
                    $i++;
                    break;
            }
        }

        return $accumulator;
    }
}
