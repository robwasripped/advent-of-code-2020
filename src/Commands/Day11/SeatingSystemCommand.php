<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day11;

use Robwasripped\Advent2020\Days\Day11\SeatingSystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SeatingSystemCommand extends Command
{
    protected static $defaultName = 'app.11.seating-system';

    private SeatingSystem $seatingSystem;

    public function __construct(SeatingSystem $seatingSystem)
    {
        parent::__construct();

        $this->seatingSystem = $seatingSystem;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/11/seats');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->seatingSystem->countStableOccupiedSeats($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
