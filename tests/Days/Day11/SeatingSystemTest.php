<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day11;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day11\SeatingSystem;

class SeatingSystemTest extends TestCase
{
    private SeatingSystem $seatingSystem;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seatingSystem = new SeatingSystem();
    }

    /**
     * @test
     */
    public function countStableOccupiedSeats_returns_expected_value(): void
    {
        $sampleData = <<<SEATS
        L.LL.LL.LL
        LLLLLLL.LL
        L.L.L..L..
        LLLL.LL.LL
        L.LL.LL.LL
        L.LLLLL.LL
        ..L.L.....
        LLLLLLLLLL
        L.LLLLLL.L
        L.LLLLL.LL
        SEATS;

        $result = $this->seatingSystem->countStableOccupiedSeats($sampleData);

        $this->assertSame(37, $result);
    }
}
