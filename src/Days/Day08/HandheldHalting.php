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

    public function getAccumulatorValueWithAlteredLoop(string $commandsString): int
    {
        $commands = array_map(fn(string $commandString) => \explode(' ', $commandString), \explode("\n", $commandsString));
        $loopEndingIndex = count($commands);

        foreach($commands as $index => list($command,)) {
            $commandsCopy = $commands;

            if ($command === 'acc') {
                continue;
            }

            if ($command === 'jmp') {
                $commandsCopy[$index][0] = 'nop';
            } elseif ($command === 'nop') {
                $commandsCopy[$index][0] = 'jmp';
            }

            $visitedIndices = [];
            $accumulator = 0;

            $i = 0;
            while(!\in_array($i, $visitedIndices)) {

                if ($i === $loopEndingIndex) {
                    return $accumulator;
                }

                $visitedIndices[] = $i;

                list($loopCommand, $loopValue) = $commandsCopy[$i];

                switch ($loopCommand) {
                    case 'jmp':
                        $i += (int) $loopValue;
                        break;
                    case 'acc':
                        $accumulator += (int) $loopValue;
                    default:
                        $i++;
                        break;
                }
            }
        }

        throw new \RuntimeException('Could not find corrupt command');
    }
}
