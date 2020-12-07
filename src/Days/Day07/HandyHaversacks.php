<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day07;

use Brightzone\GremlinDriver\Connection;
use Robwasripped\Advent2020\Utility\StringIterator;

class HandyHaversacks
{
    private Connection $gremlinConnection;

    private StringIterator $stringIterator;

    public function __construct(
        Connection $greamlinConnection,
        StringIterator $stringIterator
    )
    {
        $this->gremlinConnection = $greamlinConnection;
        $this->stringIterator = $stringIterator;
    }

    public function countPossibleParentBags(string $bagColor, string $bagData): int
    {
        sleep(5);
        $this->gremlinConnection->open();

        foreach($this->stringIterator->iterateString($bagData) as $rule) {

            list($container, $containedString) = \explode(' contain ', $rule);

            $container = \rtrim($container, 's');

            $containedArray = \explode(', ', $containedString);
            foreach($containedArray as $contained) {
                $contained = rtrim($contained, 's');

                $matches = [];
                \preg_match('/(\d+) (.+)/', $contained, $matches);

                list(, $containedCount, $containedName) = $matches;

                $this->addGraphEntry($container, $containedName, (int) $containedCount);
            }
        }

        $result = $this->gremlinConnection->send(
            <<<GREMLIN
            g.V()
            GREMLIN
        );

        $this->gremlinConnection->close();
        var_dump($result);die;
        return 0;
    }

    private function addGraphEntry(string $container, string $contained, int $containedCount): void
    {
        $this->gremlinConnection->run(
            <<<GREMLIN
            g.V().
            has("bag", "name", $container).
            fold().
            coalesce(
                unfold(),
                addV("bag").
                property(single, "name", $container)
            ).
            as("container").
            addV("bag").
            property(single, "name", $contained).
            as("contained").
            addE("contains").
            property("count", $containedCount).
            from("container").
            to("contained")
            GREMLIN
        );
    }
}
