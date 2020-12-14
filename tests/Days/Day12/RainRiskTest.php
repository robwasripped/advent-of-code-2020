<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day12;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day12\RainRisk;
use Robwasripped\Advent2020\Utility\StringIterator;

class RainRiskTest extends TestCase
{
    private RainRisk $rainRisk;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rainRisk = new RainRisk(
            new StringIterator()
        );
    }

    /**
     * @test
     */
    public function getManhattanDistanceForGivenCourse_returns_expected_value(): void
    {
        $sampleData = <<<COURSE
        F10
        N3
        F7
        R90
        F11
        COURSE;

        $result = $this->rainRisk->getManhattanDistanceForGivenCourse($sampleData);

        $this->assertSame(25, $result);
    }
}
