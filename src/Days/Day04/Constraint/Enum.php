<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04\Constraint;

class Enum implements ConstraintInterface
{
    private array $enums;

    public function __construct(string ...$enums)
    {
        $this->enums = $enums;
    }

    public function isValid(string $value): bool
    {
        return \in_array($value, $this->enums, true);
    }
}
