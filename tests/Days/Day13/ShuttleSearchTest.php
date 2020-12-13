<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day13;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day13\ShuttleSearch;

class ShuttleSearchTest extends TestCase
{
    private ShuttleSearch $shuttleSearch;

    protected function setUp(): void
    {
        parent::setUp();

        $this->shuttleSearch = new ShuttleSearch();
    }

    /**
     * @test
     */
    public function findSoonestShuttleTimesDelay_returns_expected_value(): void
    {
        $sampleData = <<<SCHEDULE
        939
        7,13,x,x,59,x,31,19
        SCHEDULE;

        $result = $this->shuttleSearch->findSoonestShuttleTimesDelay($sampleData);

        $this->assertSame(295, $result);
    }
}
