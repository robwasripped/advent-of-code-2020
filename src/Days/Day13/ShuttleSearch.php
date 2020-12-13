<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day13;

class ShuttleSearch
{
    public function findSoonestShuttleTimesDelay(string $scheduleData): int
    {
        list($earliestDepartureTime, $shuttleIdsString) = \explode("\n", $scheduleData);

        $shuttleIds = \array_filter(\explode(',', $shuttleIdsString), fn($value) => $value !== 'x');

        $smallestRemainder = (int) $earliestDepartureTime;
        $soonestShuttle = 0;

        foreach($shuttleIds as $shuttleId) {
            $shuttleRemainder = $shuttleId - $earliestDepartureTime % (int) $shuttleId;
            $smallestRemainder = \min($smallestRemainder, $shuttleRemainder);

            if ($shuttleRemainder === $smallestRemainder) {
                $soonestShuttle = $shuttleId;
            }
        }

        return $smallestRemainder * $soonestShuttle;
    }
}
