<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04\Constraint;

class Range implements ConstraintInterface
{
    private int $minimum;
    private int $maximum;

    public function __construct(int $minimum, int $maximum)
    {
        $this->minimum = $minimum;
        $this->maximum = $maximum;
    }

    public function isValid(string $value): bool
    {
        $integerValue = (int) $value;

        return $integerValue >= $this->minimum
            && $integerValue <= $this->maximum;
    }
}
