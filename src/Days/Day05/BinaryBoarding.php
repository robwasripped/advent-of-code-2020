<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day05;

use Robwasripped\Advent2020\Utility\StringIterator;

class BinaryBoarding
{
    private StringIterator $stringIterator;

    public function __construct(StringIterator $stringIterator)
    {
        $this->stringIterator = $stringIterator;
    }

    public function findHighestSeatId(string $boardingPassesString): int
    {
        $highestSeatId = 0;
        foreach($this->stringIterator->iterateString($boardingPassesString) as $boardingPassString) {

            list($rowString, $seatString) = \str_split($boardingPassString, 7);

            $row = \bindec(\str_replace(['F', 'B'], ['0', '1'], $rowString));
            $seat = \bindec(\str_replace(['L', 'R'], ['0', '1'], $seatString));

            $seatId = $row * 8 + $seat;

            $highestSeatId = \max($highestSeatId, $seatId);
        }

        return $highestSeatId;
    }
}
