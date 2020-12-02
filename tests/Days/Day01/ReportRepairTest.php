<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day01;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day01\ReportRepair;

class ReportRepairTest extends TestCase
{
    private ReportRepair $reportRepair;

    protected function setUp(): void
    {
        parent::setUp();

        $this->reportRepair = new ReportRepair();
    }

    /**
     * @test
     */
    public function fixture_returns_product_of_value_pair_summing_to_2020(): void
    {
        $sampleData = [
            1721,
            979,
            366,
            299,
            675,
            1456,
        ];

        $result = ($this->reportRepair)($sampleData, 2020);

        $this->assertSame(514579, $result);
    }

    /**
     * @test
     */
    public function fixture_does_not_sum_same_number(): void
    {
        $sampleData = [10, 5, 15];

        $result = ($this->reportRepair)($sampleData, 20);

        $this->assertSame(75, $result);
    }
}
