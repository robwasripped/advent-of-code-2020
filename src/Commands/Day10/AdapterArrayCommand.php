<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day10;

use Robwasripped\Advent2020\Days\Day10\AdapterArray;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AdapterArrayCommand extends Command
{
    protected static $defaultName = 'app.10.adapter-array';

    private AdapterArray $adapterArray;

    public function __construct(AdapterArray $adapterArray)
    {
        parent::__construct();

        $this->adapterArray = $adapterArray;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/10/joltages');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->adapterArray->sum_difference_counts($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
