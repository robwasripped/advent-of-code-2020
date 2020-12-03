<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Utility;

class StringIterator
{
    public function iterateString(string $string, string $delimiter = "\n"): iterable
    {
        $array = explode($delimiter, $string);

        foreach ($array as $element) {
            if (empty($element)) {
                continue;
            }

            yield $element;
        }
    }
}
