<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day09;

use Robwasripped\Advent2020\Days\Day09\EncodingError;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EncodingErrorCommand extends Command
{
    protected static $defaultName = 'app.9.encoding-error';

    private EncodingError $encodingError;

    public function __construct(EncodingError $encodingError)
    {
        parent::__construct();

        $this->encodingError = $encodingError;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/09/xmas');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->encodingError->findFirstNumberToNotSumFromPrevious5numbers($dataString, 25);
        $output->writeln(['Result:', $result1]);

        $output->writeln('Processing Data for part 2');
        $result2 = $this->encodingError->sumBoundaryNumbersOfContiguousNumbersSummingToGivenNumber($dataString, $result1);
        $output->writeln(['Result:', $result2]);

        return 0;
    }
}
