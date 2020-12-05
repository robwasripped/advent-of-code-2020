<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day05;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day05\BinaryBoarding;
use Robwasripped\Advent2020\Utility\StringIterator;

class BinaryBoardingTest extends TestCase
{
    private BinaryBoarding $binaryBoarding;

    protected function setUp(): void
    {
        parent::setUp();

        $this->binaryBoarding = new BinaryBoarding(
            new StringIterator()
        );
    }

    /**
     * @test
     */
    public function findHighestSeatId_returns_expected_result(): void
    {
        $sampleData = 'FBFBBFFRLR';

        $result = $this->binaryBoarding->findHighestSeatId($sampleData);

        $this->assertsame(357, $result);
    }
}
