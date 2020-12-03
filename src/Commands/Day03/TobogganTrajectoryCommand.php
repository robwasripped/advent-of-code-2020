<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day03;

use Robwasripped\Advent2020\Days\Day03\TobogganTrajectory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TobogganTrajectoryCommand extends Command
{
    protected static $defaultName = 'app.3.toboggan-trajectory';

    private TobogganTrajectory $tobogganTrajectory;

    public function __construct(TobogganTrajectory $tobogganTrajectory)
    {
        parent::__construct();

        $this->tobogganTrajectory = $tobogganTrajectory;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/03/map');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->tobogganTrajectory->solvePart1($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
