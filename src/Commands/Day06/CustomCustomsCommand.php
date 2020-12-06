<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Commands\Day06;

use Robwasripped\Advent2020\Days\Day06\CustomCustoms;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CustomCustomsCommand extends Command
{
    protected static $defaultName = 'app.6.custom-customs';

    private CustomCustoms $customCustoms;

    public function __construct(CustomCustoms $customCustoms)
    {
        parent::__construct();

        $this->customCustoms = $customCustoms;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading Data');

        $dataString = \file_get_contents(__DIR__ . '/../../../data/06/answers');

        $output->writeln('Processing Data for part 1');
        $result1 = $this->customCustoms->sumUniqueAnswersPerGroup($dataString);
        $output->writeln(['Result:', $result1]);

        return 0;
    }
}
