<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day13;

use Robwasripped\Advent2020\Days\Day13\ShuttleSearch;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShuttleSearchCommand extends Command
{
    protected static $defaultName = 'app.13.shuttle-search';

    private ShuttleSearch $suttleSearch;

    public function __construct(ShuttleSearch $suttleSearch)
    {
        parent::__construct();

        $this->suttleSearch = $suttleSearch;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/13/schedule');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->suttleSearch->findSoonestShuttleTimesDelay($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
