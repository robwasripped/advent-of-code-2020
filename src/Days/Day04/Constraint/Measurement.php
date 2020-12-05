<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04\Constraint;

class Measurement implements ConstraintInterface
{
    /**
     * @var array<string, ConstraintInterface>
     */
    private array $digitConstraints;

    public function __construct(array $digitConstraints)
    {
        foreach($digitConstraints as $unit => $constraint) {
            $this->addDigitConstraint($unit, $constraint);
        }
    }

    private function addDigitConstraint(string $unit, ConstraintInterface $constraint): void
    {
        $this->digitConstraints[$unit] = $constraint;
    }

    public function isValid($value): bool
    {
        if (\preg_match('#^(\d+)(\w+)$#', $value, $matches) !== 1) {
            return false;
        }

        list(, $digit, $unit) = $matches;

        if (!\in_array($unit, \array_keys($this->digitConstraints))) {
            return false;
        }

        return $this->digitConstraints[$unit]->isValid($digit);
    }
}
