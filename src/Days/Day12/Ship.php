<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day12;

class Ship
{
    public const DIRECTION_NORTH = 'N';
    public const DIRECTION_EAST = 'E';
    public const DIRECTION_SOUTH = 'S';
    public const DIRECTION_WEST = 'W';
    public const ROTATION_LEFT = 'L';
    public const ROTATION_RIGHT = 'R';
    public const DIRECTION_FORWARD = 'F';

    private const FACING_VALUES = [
        self::DIRECTION_EAST,
        self::DIRECTION_SOUTH,
        self::DIRECTION_WEST,
        self::DIRECTION_NORTH,
    ];

    private int $xPosition = 0;

    private int $yPosition = 0;

    private int $facing = 0;

    public function moveNorth(int $units): void
    {
        $this->yPosition += $units;
    }

    public function moveEast(int $units): void
    {
        $this->xPosition += $units;
    }

    public function moveSouth(int $units): void
    {
        $this->yPosition -= $units;
    }

    public function moveWest(int $units): void
    {
        $this->xPosition -= $units;
    }

    public function moveForward(int $units): void
    {
        $direction = self::FACING_VALUES[$this->facing % 4];
        $this->move($direction, $units);
    }

    public function move(string $direction, int $units): void
    {
        switch($direction) {
            case self::DIRECTION_NORTH:
                $this->moveNorth($units);
                break;
            case self::DIRECTION_EAST:
                $this->moveEast($units);
                break;
            case self::DIRECTION_SOUTH:
                $this->moveSouth($units);
                break;
            case self::DIRECTION_WEST:
                $this->moveWest($units);
                break;
            case self::ROTATION_LEFT:
                $this->turnLeft($units);
                break;
            case self::ROTATION_RIGHT:
                $this->turnRight($units);
                break;
            case self::DIRECTION_FORWARD:
                $this->moveForward($units);
                break;
        }
    }

    public function turnLeft(int $degrees): void
    {
        $this->facing += (int) ($degrees / 360 * 4 * 3);
    }

    public function turnRight(int $degrees): void
    {
        $this->facing += (int) ($degrees / 360 * 4);
    }

    public function getManhattanDistance(): int
    {
        return abs($this->xPosition) + abs($this->yPosition);
    }
}
