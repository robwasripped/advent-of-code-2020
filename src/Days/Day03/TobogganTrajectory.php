<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day03;

use Robwasripped\Advent2020\Utility\StringIterator;

class TobogganTrajectory
{
    private StringIterator $stringIterator;

    public function __construct(
        StringIterator $stringIterator
    ) {
        $this->stringIterator = $stringIterator;
    }

    public function solve(string $inputString, int $rightStep, int $downStep): int
    {
        $modulo = \strpos($inputString, "\n");

        $treeCollisions = 0;
        $rightSteps = 0;

        foreach ($this->stringIterator->iterateString($inputString) as  $index => $row) {

            if ($index % $downStep !== 0) {
                continue;
            }

            if ($row[$rightSteps % $modulo] === '#') {
                $treeCollisions++;
            }

            $rightSteps += $rightStep;
        }

        return $treeCollisions;
    }
}
