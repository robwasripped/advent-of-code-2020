<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day06;

use Robwasripped\Advent2020\Utility\StringIterator;

class CustomCustoms
{
    private StringIterator $stringIterator;

    public function __construct(
        StringIterator $stringIterator
    )
    {
        $this->stringIterator = $stringIterator;
    }

    public function sumUniqueAnswersPerGroup(string $inputString): int
    {
        $answerStringsByGroups = \explode("\n\n", $inputString);

        return \array_sum(\array_map([$this, 'countUniqueAnswersForGroup'], $answerStringsByGroups));
    }

    private function countUniqueAnswersForGroup(string $groupAnswers): int
    {
        return \strlen(\count_chars(\str_replace("\n", '', $groupAnswers), 3));
    }

    public function sumUAnswersGivenByAllPerGroup(string $inputString): int
    {
        $answerStringsByGroups = \explode("\n\n", $inputString);

        return \array_sum(\array_map([$this, 'countAnswersGivenByAllPassengersInGroup'], $answerStringsByGroups));
    }

    private function countAnswersGivenByAllPassengersInGroup(string $groupAnswers): int
    {
        $groupAnswersArray = \array_map('str_split', \iterator_to_array($this->stringIterator->iterateString($groupAnswers)));

        return \count($groupAnswersArray) === 1
            ? \count($groupAnswersArray[0])
            : \count(\array_intersect(...$groupAnswersArray));
    }
}
