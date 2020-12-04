<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04;

class PassportProcessing
{
    public function solvePart1(string $inputData): int
    {
        $passportsArray = explode("\n\n", $inputData);

        $requiredFields = [
            'byr',
            'iyr',
            'eyr',
            'hgt',
            'hcl',
            'ecl',
            'pid',
        ];
        sort($requiredFields);

        $validPassports = 0;
        foreach($passportsArray as $passportDataString) {
            $passportData = preg_split('/\s/', $passportDataString);

            $presentRequiredFields = [];

            foreach($passportData as $passportDatum) {
                list($key,) = \explode(':', $passportDatum);

                if (\in_array($key, $requiredFields, true)) {
                    $presentRequiredFields[] = $key;
                }
            }

            sort($presentRequiredFields);

            if ($requiredFields === $presentRequiredFields) {
                $validPassports++;
            }
        }

        return $validPassports;
    }
}
