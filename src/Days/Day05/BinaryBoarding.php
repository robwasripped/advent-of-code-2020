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

            $seatId = $this->getSeatId($boardingPassString);
            $highestSeatId = \max($highestSeatId, $seatId);

        }

        return $highestSeatId;
    }

    public function findMissingSeatId(string $boardingPassesString): int
    {
        $seatIds = [];
        foreach($this->stringIterator->iterateString($boardingPassesString) as $boardingPassString) {
            $seatIds[] = $this->getSeatId($boardingPassString);
        }

        sort($seatIds);
        $seatIdCount = count($seatIds);

        $missingNextNumber = false;
        foreach($seatIds as $index => $seatId) {
            if ($index - 1 < 0 || $index + 1 >= $seatIdCount) {
                continue;
            }

            if ($seatId - 1 === $missingNextNumber) {
                return $missingNextNumber;
            }

            if ($seatIds[$index + 1] !== $expectedNextNumber = $seatId + 1) {
                $missingNextNumber = $expectedNextNumber;
            }
        }

        throw new \Exception('no missing seat found for given boarding pass strings');
    }

    private function getSeatId(string $boardingPassString): int
    {
        list($rowString, $seatString) = \str_split($boardingPassString, 7);

        $row = (int) \bindec(\str_replace(['F', 'B'], ['0', '1'], $rowString));
        $seat = (int) \bindec(\str_replace(['L', 'R'], ['0', '1'], $seatString));

        return $row * 8 + $seat;
    }
}
