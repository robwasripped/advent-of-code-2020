<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day04;

use Robwasripped\Advent2020\Days\Day04\PassportProcessing;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PassportProcessingCommand extends Command
{
    protected static $defaultName = 'app.4.passport-processing';

    private PassportProcessing $passportProcessing;

    public function __construct(PassportProcessing $passportProcessing)
    {
        parent::__construct();

        $this->passportProcessing = $passportProcessing;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/04/passports');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->passportProcessing->solvePart1($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
