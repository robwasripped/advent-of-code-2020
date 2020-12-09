<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day09;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day09\EncodingError;

class EncodingErrorTest extends TestCase
{
    private EncodingError $encodingError;

    protected function setUp(): void
    {
        parent::setUp();

        $this->encodingError = new EncodingError();
    }

    /**
     * @test
     */
    public function findFirstNumberToNotSumFromPrevious5numbers_returns_expected_result(): void
    {
        $sampleData = <<<NUMBERS
        35
        20
        15
        25
        47
        40
        62
        55
        65
        95
        102
        117
        150
        182
        127
        219
        299
        277
        309
        576
        NUMBERS;

        $result = $this->encodingError->findFirstNumberToNotSumFromPrevious5numbers($sampleData, 5);

        $this->assertSame(127, $result);
    }
}
