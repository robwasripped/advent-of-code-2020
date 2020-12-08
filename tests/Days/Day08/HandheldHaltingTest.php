<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day08;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day08\HandheldHalting;

class HandheldHaltingTest extends TestCase
{
    private HandheldHalting $handheldHalting;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handheldHalting = new HandheldHalting();
    }

    /**
     * @test
     */
    public function getAccumulatorValueBeforeLoop_returns_expected_value(): void
    {
        $commands = <<<COMMANDS
        nop +0
        acc +1
        jmp +4
        acc +3
        jmp -3
        acc -99
        acc +1
        jmp -4
        acc +6
        COMMANDS;

        $result = $this->handheldHalting->getAccumulatorValueBeforeLoop($commands);

        $this->assertSame(5, $result);
    }
}
