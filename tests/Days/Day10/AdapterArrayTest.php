<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day10;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day10\AdapterArray;

class AdapterArrayTest extends TestCase
{
    private AdapterArray $adapterArray;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adapterArray = new AdapterArray();
    }

    /**
     * @test
     */
    public function sum_difference_counts_returns_expected_value(): void
    {
        $sampleData = <<<JOLTAGES
        28
        33
        18
        42
        31
        14
        46
        20
        48
        47
        24
        23
        49
        45
        19
        38
        39
        11
        1
        32
        25
        35
        8
        17
        7
        9
        4
        2
        34
        10
        3
        JOLTAGES;

        $result = $this->adapterArray->sum_difference_counts($sampleData);

        $this->assertSame(22 * 10, $result);
    }
}
