<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day06;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day06\CustomCustoms;

class CustomCustomsTest extends TestCase
{
    private CustomCustoms $customCustoms;

    protected function setUp(): void
    {
        parent::setUp();

        $this->customCustoms = new CustomCustoms();
    }

    /**
     * @test
     */
    public function sumUniqueAnswersPerGroup_correctly_sums_answers(): void
    {
        $sampleData = <<<ANSWERS
        abc

        a
        b
        c

        ab
        ac

        a
        a
        a
        a

        b
        ANSWERS;

        $result = $this->customCustoms->sumUniqueAnswersPerGroup($sampleData);

        $this->assertSame(11, $result);
    }
}
