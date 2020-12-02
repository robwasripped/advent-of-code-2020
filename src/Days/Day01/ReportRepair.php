<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day01;

class ReportRepair
{
    public function solvePart1(array $reportValues, int $sumTarget): int
    {
        foreach($reportValues as $aIndex => $a) {
            foreach($reportValues as $bIndex => $b) {
                if($aIndex === $bIndex) {
                    continue;
                }

                $a = (int) $a;
                $b = (int) $b;

                if($a + $b === $sumTarget) {
                    return $a * $b;
                }
            }
        }
    }

    public function solvePart2(array $reportValues, int $sumTarget): int
    {
        foreach($reportValues as $aIndex => $a) {
            foreach($reportValues as $bIndex => $b) {
                foreach($reportValues as $cIndex => $c) {
                    if($aIndex - $bIndex === 0 && $bIndex - $cIndex === 0) {
                        continue;
                    }

                    $a = (int) $a;
                    $b = (int) $b;
                    $c = (int) $c;

                    if($a + $b + $c === $sumTarget) {
                        return $a * $b * $c;
                    }
                }
            }
        }
    }
}
