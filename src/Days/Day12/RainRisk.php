<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day12;

use Robwasripped\Advent2020\Utility\StringIterator;

class RainRisk
{
    private StringIterator $stringIterator;

    public function __construct(
        StringIterator $stringIterator
    )
    {
        $this->stringIterator = $stringIterator;
    }

    public function getManhattanDistanceForGivenCourse(string $courseString): int
    {
        $ship = new Ship();

        foreach ($this->stringIterator->iterateString($courseString) as $courseValue) {

            $direction = $courseValue[0];
            $units = (int) \substr($courseValue, 1);

            $ship->move($direction, $units);
        }

        return $ship->getManhattanDistance();
    }
}
