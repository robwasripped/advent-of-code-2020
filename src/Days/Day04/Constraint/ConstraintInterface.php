<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04\Constraint;

interface ConstraintInterface
{
    public function isValid(string $value): bool;
}
