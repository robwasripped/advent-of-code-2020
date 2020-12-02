<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day02;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day02\PasswordPhilosophy;

class PasswordPhilosophyTest extends TestCase
{
    private PasswordPhilosophy $passwordPhilosophy;

    protected function setUp(): void
    {
        parent::setUp();

        $this->passwordPhilosophy = new PasswordPhilosophy();
    }

    /**
     * @test
     */
    public function fixture_part_1_will_correctly_counts_valid_passwords(): void
    {
        $sampleData = <<<DATA
        1-3 a: abcde
        1-3 b: cdefg
        2-9 c: ccccccccc
        DATA;

        $result = $this->passwordPhilosophy->solvePart1($sampleData);

        $this->assertSame(2, $result);
    }

    /**
     * @test
     */
    public function fixture_part_2_will_correctly_counts_valid_passwords(): void
    {
        $sampleData = <<<DATA
        1-3 a: abcde
        1-3 b: cdefg
        2-9 c: ccccccccc
        DATA;

        $result = $this->passwordPhilosophy->solvePart2($sampleData);

        $this->assertSame(1, $result);
    }
}
