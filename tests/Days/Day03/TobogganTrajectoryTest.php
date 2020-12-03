<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day03;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day03\TobogganTrajectory;
use Robwasripped\Advent2020\Utility\StringIterator;

class TobogganTrajectoryTest extends TestCase
{
    private TobogganTrajectory $tobogganTrajectory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tobogganTrajectory = new TobogganTrajectory(
            new StringIterator()
        );
    }

    /**
     * @test
     */
    public function solvePart1_returns_angle_with_fewest_trees(): void
    {
        $mapData = <<<MAP
        ..##.......
        #...#...#..
        .#....#..#.
        ..#.#...#.#
        .#...##..#.
        ..#.##.....
        .#.#.#....#
        .#........#
        #.##...#...
        #...##....#
        .#..#...#.#
        MAP;

        $result = $this->tobogganTrajectory->solvePart1($mapData);

        $this->assertSame(7, $result);
    }
}
