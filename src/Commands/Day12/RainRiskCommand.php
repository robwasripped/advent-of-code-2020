<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day12;

use Robwasripped\Advent2020\Days\Day12\RainRisk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RainRiskCommand extends Command
{
    protected static $defaultName = 'app.12.rain-risk';

    private RainRisk $rainRisk;

    public function __construct(RainRisk $rainRisk)
    {
        parent::__construct();

        $this->rainRisk = $rainRisk;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/12/course');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->rainRisk->getManhattanDistanceForGivenCourse($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
