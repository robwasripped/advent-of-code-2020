<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day02;

class PasswordPhilosophy
{
    public function __invoke(string $passwordData): int
    {
        $dataArray = explode("\n", $passwordData);

        $validPassword = 0;

        foreach ($dataArray as $password) {
            if (empty($password)) {
                continue;
            }

            $validPassword += (int) $this->isValid($password);
        }

        return $validPassword;
    }

    private function isValid(string $passwordData): bool
    {
        list($minOccurances, $maxOccurenaces, $character, $password) = \sscanf($passwordData, '%d-%d %s %s');
        $character = $character[0];

        $allCharacterOccurences = \count_chars($password, 1);

        $characterOccurences = $allCharacterOccurences[\ord($character)] ?? 0;

        return $characterOccurences >= $minOccurances && $characterOccurences <= $maxOccurenaces;
    }
}
