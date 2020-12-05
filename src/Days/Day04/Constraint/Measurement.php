<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04\Constraint;

use InvalidArgumentException;

class Measurement implements ConstraintInterface
{
    /**
     * @var array<string, ConstraintInterface>
     */
    private array $digitConstraints = [];

    public function __construct(array $digitConstraints)
    {
        foreach($digitConstraints as $unit => $constraint) {
            if (!\is_string($unit) || !$constraint instanceof ConstraintInterface) {
                throw new InvalidArgumentException('Constraints should be an array of string indexed constraint interfaces.');
            }

            $this->digitConstraints[$unit] = $constraint;
        }
    }

    public function isValid(string $value): bool
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
