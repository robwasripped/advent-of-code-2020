<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04\Constraint;

class Number implements ConstraintInterface
{
    private ?int $length;

    public function __construct(?int $length = null)
    {
        $this->length = $length;
    }

    public function isValid($value): bool
    {
        if (!\ctype_digit($value)) {
            return false;
        }

        if(\is_int($this->length) && \strlen($value) !== $this->length) {
            return false;
        }

        return true;
    }
}
