<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day04;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day04\PassportProcessing;

class PassportProcessingTest extends TestCase
{
    private PassportProcessing $passportProcessing;

    protected function setUp(): void
    {
        $this->passportProcessing = new PassportProcessing();
    }

    /**
     * @test
     */
    public function solvePart1_returns_expected_valid_passport_count(): void
    {
        $sampleData = <<<PASSPORTS
        ecl:gry pid:860033327 eyr:2020 hcl:#fffffd
        byr:1937 iyr:2017 cid:147 hgt:183cm

        iyr:2013 ecl:amb cid:350 eyr:2023 pid:028048884
        hcl:#cfa07d byr:1929

        hcl:#ae17e1 iyr:2013
        eyr:2024
        ecl:brn pid:760753108 byr:1931
        hgt:179cm

        hcl:#cfa07d eyr:2025 pid:166559648
        iyr:2011 ecl:brn hgt:59in
        PASSPORTS;

        $result = $this->passportProcessing->solvePart1($sampleData);

        $this->assertSame(2, $result);
    }
}
