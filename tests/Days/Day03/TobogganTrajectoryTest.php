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
     * @dataProvider angleProvider
     */
    public function solve_returns_trees_given_angle(int $expectedResult, int $rightStep, int $downStep): void
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

        $result = $this->tobogganTrajectory->solve($mapData, $rightStep, $downStep);

        $this->assertSame($expectedResult, $result);
    }

    public function angleProvider(): array
    {
        return [
            [2, 1, 1],
            [7, 3, 1],
            [3, 5, 1],
            [4, 7, 1],
            [2, 1, 2],
        ];
    }
}
