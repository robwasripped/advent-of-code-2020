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
    public function fixture_will_correctly_counts_valid_passwords(): void
    {
        $sampleData = <<<DATA
        1-3 a: abcde
        1-3 b: cdefg
        2-9 c: ccccccccc
        DATA;

        $result = ($this->passwordPhilosophy)($sampleData);

        $this->assertSame(2, $result);
    }
}
