<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day10;

class AdapterArray
{
    public function sum_difference_counts(string $joltages): int
    {
        $joltagesArray = explode("\n", $joltages);
        $joltagesArray[] = 0;

        \sort($joltagesArray);

        $joltageDifferenceCounts = [
            1 => 0,
            2 => 0,
            3 => 0,
        ];

        foreach($joltagesArray as $index => $joltage) {
            $joltageDifferenceCounts[(\array_key_exists($index + 1, $joltagesArray) ? $joltagesArray[$index + 1] : ((int) $joltage + 3)) - (int) $joltage]++;
        }

        return $joltageDifferenceCounts[1] * $joltageDifferenceCounts[3];
    }
}
