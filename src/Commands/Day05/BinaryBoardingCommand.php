<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day05;

use Robwasripped\Advent2020\Days\Day05\BinaryBoarding;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BinaryBoardingCommand extends Command
{
    protected static $defaultName = 'app.5.binary-boarding';

    private BinaryBoarding $binaryBoarding;

    public function __construct(BinaryBoarding $binaryBoarding)
    {
        parent::__construct();

        $this->binaryBoarding = $binaryBoarding;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/05/passes');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->binaryBoarding->findHighestSeatId($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
