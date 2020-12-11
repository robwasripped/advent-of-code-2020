<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day11;

class SeatingSystem
{
    private const CELL_FLOOR = '.';
    private const CELL_EMPTY = 'L';
    private const CELL_OCCUPIED = '#';

    public function countStableOccupiedSeats(string $seatMapString): int
    {
        $currentSeatMap = $this->getSeatMapArray($seatMapString);
        if($currentSeatMap[\array_key_last($currentSeatMap)] === ['']) {
            unset($currentSeatMap[\array_key_last($currentSeatMap)]);
        }

        do {
            $previousSeatMap = $currentSeatMap;

            $currentSeatMap = $this->doSeatRound($currentSeatMap);
        } while ($previousSeatMap !== $currentSeatMap);

        return \array_reduce($currentSeatMap, fn(?int $carry, array $row) => (int) $carry + \substr_count(\implode('', $row), '#'));
    }

    private function getSeatMapArray(string $seatMapString): array
    {
        return \array_map('\str_split', explode("\n", $seatMapString));
    }

    private function doSeatRound(array $seatMap): array
    {
        $newSeatMap = [];
        $columnLength = count($seatMap);
        foreach($seatMap as $rowIndex => $row) {
            $rowLength = count($row);
            foreach($row as $columnIndex => $value) {

                if ($value === self::CELL_FLOOR) {
                    $newSeatMap[$rowIndex][$columnIndex] = self::CELL_FLOOR;
                    continue;
                }

                $occupiedAdjacentSeats = 0;

                foreach([$rowIndex - 1, $rowIndex, $rowIndex + 1] as $adjacentRowIndex) {
                    if($adjacentRowIndex < 0 || $adjacentRowIndex >= $columnLength) {
                        continue;
                    }

                    foreach([$columnIndex - 1, $columnIndex, $columnIndex + 1] as $adjacentColumnIndex) {
                        if($adjacentColumnIndex < 0 || $adjacentColumnIndex >= $rowLength) {
                            continue;
                        }

                        if ($adjacentRowIndex === $rowIndex && $adjacentColumnIndex === $columnIndex) {
                            continue;
                        }

                        if($seatMap[$adjacentRowIndex][$adjacentColumnIndex] === self::CELL_OCCUPIED) {
                            $occupiedAdjacentSeats++;
                        }

                    }
                }

                if ($value === self::CELL_EMPTY && $occupiedAdjacentSeats === 0) {
                    $newSeatMap[$rowIndex][$columnIndex] = self::CELL_OCCUPIED;
                    continue;
                }

                if ($value === self::CELL_OCCUPIED && $occupiedAdjacentSeats >= 4) {
                    $newSeatMap[$rowIndex][$columnIndex] = self::CELL_EMPTY;
                    continue;
                }

                $newSeatMap[$rowIndex][$columnIndex] = $value;

            }
        }

        return $newSeatMap;
    }
}
