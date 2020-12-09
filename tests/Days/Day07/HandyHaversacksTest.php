<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day07;

use Brightzone\GremlinDriver\Connection;
use Brightzone\GremlinDriver\Serializers\Gson3;
use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day07\HandyHaversacks;
use Robwasripped\Advent2020\Utility\StringIterator;

class HandyHaversacksTest extends TestCase
{
    private HandyHaversacks $handyHaversacks;

    protected function setUp(): void
    {
        parent::setUp();

        $connection = new Connection([
            'host' => \getenv('GRAPH_HOST'),
            'port' => \getenv('GRAPH_PORT'),
            'graph' => \getenv('GRAPH_GRAPH'),
        ]);
        $connection->message->registerSerializer(Gson3::class, true);

        $this->handyHaversacks = new HandyHaversacks(
            $connection,
            new StringIterator()
        );
    }

    /**
     * @test
     */
    public function countPossibleParentBags_returns_expected_count(): void
    {
        $sampleData = <<<RULES
        light red bags contain 1 bright white bag, 2 muted yellow bags.
        dark orange bags contain 3 bright white bags, 4 muted yellow bags.
        bright white bags contain 1 shiny gold bag.
        muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.
        shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.
        dark olive bags contain 3 faded blue bags, 4 dotted black bags.
        vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.
        faded blue bags contain no other bags.
        dotted black bags contain no other bags.
        RULES;

        $result = $this->handyHaversacks->countPossibleParentBags('shiny gold', $sampleData);

        $this->assertSame(4, $result);
    }
}
