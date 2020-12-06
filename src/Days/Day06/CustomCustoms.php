<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day06;

class CustomCustoms
{
    public function sumUniqueAnswersPerGroup(string $inputString): int
    {
        $answerStringsByGroups = \explode("\n\n", $inputString);

        return \array_sum(\array_map([$this, 'countUniqueAnswersForGroup'], $answerStringsByGroups));
    }

    private function countUniqueAnswersForGroup(string $groupAnswers): int
    {
        return \strlen(\count_chars(\str_replace("\n", '', $groupAnswers), 3));
    }
}
