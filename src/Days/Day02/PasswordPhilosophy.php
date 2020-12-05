<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day02;

class PasswordPhilosophy
{
    private function iteratePasswords(string $passwordData): iterable
    {
        $dataArray = explode("\n", $passwordData);

        foreach ($dataArray as $password) {
            if (empty($password)) {
                continue;
            }

            yield $password;
        }
    }

    public function solvePart1(string $passwordData): int
    {
        $validPassword = 0;

        foreach($this->iteratePasswords($passwordData) as $password) {
            $validPassword += (int) $this->hasValidCount(...$this->parsePasswordData($password));
        }

        return $validPassword;
    }

    private function hasValidCount(int $minOccurances, int $maxOccurenaces, string $character, string $password): bool
    {
        $allCharacterOccurences = \count_chars($password, 1);

        $characterOccurences = $allCharacterOccurences[\ord($character)] ?? 0;

        return $characterOccurences >= $minOccurances && $characterOccurences <= $maxOccurenaces;
    }

    public function solvePart2(string $passwordData): int
    {
        $validPassword = 0;

        foreach($this->iteratePasswords($passwordData) as $password) {
            $validPassword += (int) $this->hasValidCharacters(...$this->parsePasswordData($password));
        }

        return $validPassword;
    }

    private function hasValidCharacters(int $position1, int $position2, string $character, string $password): bool
    {
        $position1 -= 1;
        $position2 -= 1;

        return $password[$position1] === $character xor $password[$position2] === $character;
    }

    /**
     * @return mixed[]
     */
    private function parsePasswordData(string $passwordData): array
    {
        $parsedString = \sscanf($passwordData, '%d-%d %s %s');
        \assert(\is_string($parsedString[2]));

        $parsedString[2] = $parsedString[2][0];

        return $parsedString;
    }
}
