<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04;

class PassportProcessing
{
    private const FIELD_BIRTH_YEAR = 'byr';
    private const FIELD_ISSUE_YEAR = 'iyr';
    private const FIELD_EXPIRATION_YEAR = 'eyr';
    private const FIELD_HEIGHT = 'hgt';
    private const FIELD_HAIR_COLOR = 'hcl';
    private const FIELD_EYE_COLOR = 'ecl';
    private const FIELD_PASSPORT_ID = 'pid';
    private const FIELD_COUNTRY_ID = 'cid';

    private const REQUIRED_FIELDS = [
        self::FIELD_BIRTH_YEAR,
        self::FIELD_ISSUE_YEAR,
        self::FIELD_EXPIRATION_YEAR,
        self::FIELD_HEIGHT,
        self::FIELD_HAIR_COLOR,
        self::FIELD_EYE_COLOR,
        self::FIELD_PASSPORT_ID,
    ];

    public function solvePart1(string $inputData, bool $validatedValues = false): int
    {
        $passportsArray = explode("\n\n", $inputData);

        $requiredFields = self::REQUIRED_FIELDS;
        sort($requiredFields);

        $validationConstraints = $this->getFieldConstraints();

        $validPassports = 0;
        foreach($passportsArray as $passportDataString) {
            $passportData = preg_split('/\s/', $passportDataString);

            $presentRequiredFields = [];

            foreach($passportData as $passportDatum) {

                $explodedData = \explode(':', $passportDatum);

                $key = $explodedData[0] ?? null;
                $value = $explodedData[1] ?? null;

                if ($key === null) {
                    continue 2;
                }

                if ($validatedValues && !\is_null($value) && \array_key_exists($key, $validationConstraints)) {
                    $constraints = $validationConstraints[$key];
                    foreach($constraints as $constraint) {
                        if (!$constraint->isValid($value)) {
                            continue 3;
                        }
                    }
                }

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

    /**
     * @return array<string, Constraint\ConstraintInterface[]>
     */
    private function getFieldConstraints(): array
    {
        return [
            self::FIELD_BIRTH_YEAR => [
                new Constraint\Number(4),
                new Constraint\Range(1920, 2002),
            ],
            self::FIELD_ISSUE_YEAR => [
                new Constraint\Number(4),
                new Constraint\Range(2010, 2020),
            ],
            self::FIELD_EXPIRATION_YEAR => [
                new Constraint\Number(4),
                new Constraint\Range(2020, 2030),
            ],
            self::FIELD_HEIGHT => [
                new Constraint\Measurement([
                    'cm' => new Constraint\Range(150, 193),
                    'in' => new Constraint\Range(59, 76),
                ]),
            ],
            self::FIELD_HAIR_COLOR => [
                new Constraint\HexCode(),
            ],
            self::FIELD_EYE_COLOR => [
                new Constraint\Enum('amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'),
            ],
            self::FIELD_PASSPORT_ID => [
                new Constraint\Number(9),
            ]
        ];
    }
}
