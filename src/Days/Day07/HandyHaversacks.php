<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Days\Day07;

use Brightzone\GremlinDriver\Connection;
use Brightzone\GremlinDriver\InternalException;
use Robwasripped\Advent2020\Utility\StringIterator;
use Throwable;

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
        $this->openGraphConnection();

        foreach($this->stringIterator->iterateString($bagData) as $rule) {

            list($container, $containedString) = \explode(' contain ', $rule);

            $container = \substr($container, 0, \strpos($container, ' bag'));

            $containedArray = \explode(', ', $containedString);
            foreach($containedArray as $contained) {
                $contained = rtrim($contained, 's');

                if($contained === 'no other bags.') {
                    $this->addGraphEntry($container, null, null);
                } else {

                    $matches = [];
                    $result = \preg_match('/(\d+) (.+) bags?.?/', $contained, $matches);

                    list(, $containedCount, $containedName) = $matches;

                    $this->addGraphEntry($container, $containedName, (int) $containedCount);
                }
            }
        }

        $result = $this->gremlinConnection->send(
            <<<GREMLIN
            g.V().
            has("bag", "name", "$bagColor").
            repeat(out("contained_by").as("container")).
            until(outE("contained_by").count().is(0)).
            select(all, "container").unfold().dedup().values("name")
            GREMLIN
        );

        $this->gremlinConnection->close();

        return count($result);
    }

    private function addGraphEntry(string $container, ?string $contained, ?int $containedCount): void
    {
        $query = <<<GREMLIN
        container = g.V().
            has("bag", "name", "$container").
            fold().
            coalesce(
                unfold(),
                addV("bag").
                property(single, "name", "$container")
            ).next();
        GREMLIN;

        if (\is_string($contained) && \is_int($containedCount)) {
            $query .= <<<GREMLIN
            contained = g.V().
                has("bag", "name", "$contained").
                fold().
                coalesce(
                    unfold(),
                    addV("bag").
                    property(single, "name", "$contained")
                ).
                next();

            g.V(contained).
            coalesce(
                out("contained_by").
                is(container),
                addE("contained_by").
                property(single, "count", $containedCount).
                from(contained).
                to(container)
            )
            GREMLIN;
        }

        $this->gremlinConnection->send($query);
    }

    private function openGraphConnection(): void
    {
        $attempts = 0;
        while(true) {
            try {
                $this->gremlinConnection->open();
                break;
            } catch(InternalException $exception) {
                if (++$attempts < 3) {
                    sleep(3);
                    continue;
                }

                throw $exception;
            }
        }

        $this->gremlinConnection->run('g.V().drop()');
    }
}
