<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day02;

use Robwasripped\Advent2020\Days\Day02\PasswordPhilosophy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PasswordPhilosophyCommand extends Command
{
    protected static $defaultName = 'app.2.password-philosophy';

    private PasswordPhilosophy $passwordPhilosophy;

    public function __construct(PasswordPhilosophy $passwordPhilosophy)
    {
        parent::__construct();

        $this->passwordPhilosophy = $passwordPhilosophy;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/02/passwords');

        $output->writeln('Processing Data');
        $result = ($this->passwordPhilosophy)($dataString);

        $output->writeln(['Result:', $result]);

        return 0;
    }
}
