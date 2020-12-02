<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day01;

use Robwasripped\Advent2020\Days\Day01\ReportRepair;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReportRepairCommand extends Command
{
    protected static $defaultName = 'app.1.report-repair';

    private ReportRepair $reportRepair;

    public function __construct(ReportRepair $reportRepair)
    {
        parent::__construct();

        $this->reportRepair = $reportRepair;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/01/report');
        $dataArray = \explode("\n", $dataString);
        $dataArray = \array_filter($dataArray);

        $output->writeln('Processing Data for part 1');
        $result1 = $this->reportRepair->solvePart1($dataArray, 2020);
        $output->writeln(['Result:', $result1]);

        $output->writeln('Processing Data for part 2');
        $result2 = $this->reportRepair->solvePart2($dataArray, 2020);
        $output->writeln(['Result:', $result2]);

        return 0;
    }
}
