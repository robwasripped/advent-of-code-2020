<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day08;

use Robwasripped\Advent2020\Days\Day08\HandheldHalting;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HandheldHaltingCommand extends Command
{
    protected static $defaultName = 'app.6.handheld-halting';

    private HandheldHalting $handheldHalting;

    public function __construct(HandheldHalting $handheldHalting)
    {
        parent::__construct();

        $this->handheldHalting = $handheldHalting;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/08/commands');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->handheldHalting->getAccumulatorValueBeforeLoop($dataString);
        $output->writeln(['Result:', $result1]);

        $output->writeln('Processing Data for part 2');
        $result2 = $this->handheldHalting->getAccumulatorValueWithAlteredLoop($dataString);
        $output->writeln(['Result:', $result2]);

        return 0;
    }
}
