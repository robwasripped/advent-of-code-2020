<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day01;

class ReportRepair
{
    public function __invoke(array $reportValues, int $sumTarget): int
    {
        foreach($reportValues as $aIndex => $a) {
            foreach($reportValues as $bIndex => $b) {
                if($aIndex === $bIndex) {
                    continue;
                }

                $a = (int) $a;
                $b = (int) $b;

                if($a + $b ===  $sumTarget) {
                    return $a * $b;
                }
            }
        }
    }
}
