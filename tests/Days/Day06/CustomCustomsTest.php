<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day06;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day06\CustomCustoms;
use Robwasripped\Advent2020\Utility\StringIterator;

class CustomCustomsTest extends TestCase
{
    private CustomCustoms $customCustoms;

    protected function setUp(): void
    {
        parent::setUp();

        $this->customCustoms = new CustomCustoms(
            new StringIterator()
        );
    }

    /**
     * @test
     */
    public function sumUniqueAnswersPerGroup_correctly_sums_answers(): void
    {
        $result = $this->customCustoms->sumUniqueAnswersPerGroup($this->getSampleData());

        $this->assertSame(11, $result);
    }

    /**
     * @test
     */
    public function sumUAnswersGivenByAllPerGroup_correctly_sums_answers(): void
    {
        $result = $this->customCustoms->sumUAnswersGivenByAllPerGroup($this->getSampleData());

        $this->assertSame(6, $result);
    }

    private function getSampleData(): string
    {
        return <<<ANSWERS
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
    }
}
