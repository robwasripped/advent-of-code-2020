<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Utility;

class StringIterator
{
    /**
     * @return \Generator<int, string, mixed, void>
     */
    public function iterateString(string $string, string $delimiter = "\n"): \Generator
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
