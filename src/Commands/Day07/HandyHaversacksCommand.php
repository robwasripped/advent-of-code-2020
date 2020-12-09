<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day07;

use Robwasripped\Advent2020\Days\Day07\HandyHaversacks;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HandyHaversacksCommand extends Command
{
    protected static $defaultName = 'app.7.handy-haversacks';

    private HandyHaversacks $handyHaversacks;

    public function __construct(HandyHaversacks $handyHaversacks)
    {
        parent::__construct();

        $this->handyHaversacks = $handyHaversacks;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/07/rules');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->handyHaversacks->countPossibleParentBags('shiny gold', $dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
