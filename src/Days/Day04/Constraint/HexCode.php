<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day04\Constraint;

class HexCode implements ConstraintInterface
{
    public function isValid($value): bool
    {
        list($r, $g, $b) = sscanf($value, '#%2x%2x%2x');

        return \is_int($r) && \is_int($g) && \is_int($b);
    }
}
