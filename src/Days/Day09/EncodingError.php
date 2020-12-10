<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day09;

use RuntimeException;

class EncodingError
{
    public function findFirstNumberToNotSumFromPrevious5numbers(string $numbersString, int $preamble): int
    {
        $numbers = \array_map('intval', \explode("\n", $numbersString));

        for ($i = $preamble; $i < count($numbers); $i++) {
            $number = $numbers[$i];

            $summableNumbers = \array_slice($numbers, $i - $preamble, $preamble);

            foreach($summableNumbers as $summableNumber) {
                $needleNumber = $number - $summableNumber;
                if(\in_array($needleNumber, $summableNumbers, true) && $needleNumber !== $summableNumber) {
                    continue 2;
                }
            }

            return $number;
        }

        throw new RuntimeException('No numbers lack sum');
    }

    public function sumBoundaryNumbersOfContiguousNumbersSummingToGivenNumber(string $numbersString, int $targetNumber): int
    {
        $numbers = \array_map('intval', \explode("\n", $numbersString));
        $numberCount = count($numbers);

        $count = 2;
        while($count++ <= $numberCount) {

            for($offset = 0; $offset + $count <= $numberCount; $offset++) {
                if(\array_sum($slice = \array_slice($numbers, $offset, $count)) === $targetNumber) {
                    return \min(...$slice) + max(...$slice);
                }
            }

        }

        throw new RuntimeException('No sub array summed to target number');
    }
}
