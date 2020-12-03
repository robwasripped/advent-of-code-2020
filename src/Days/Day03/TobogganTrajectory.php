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

    public function solvePart1(string $inputString): int
    {
        $modulo = \strpos($inputString, "\n");

        $treeCollisions = 0;
        $rightSteps = 0;

        foreach ($this->stringIterator->iterateString($inputString) as $row) {
            if ($row[$rightSteps % $modulo] === '#') {
                $treeCollisions++;
            }

            $rightSteps += 3;
        }

        return $treeCollisions;
    }
}
