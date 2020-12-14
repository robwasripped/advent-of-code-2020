<?php

declare(strict_types=1);

namespace Robwasripped\Advent2020\Tests\Days\Day12;

use PHPUnit\Framework\TestCase;
use Robwasripped\Advent2020\Days\Day12\Ship;

class ShipTest extends TestCase
{
    private Ship $ship;

    protected function setUp(): void
    {
        parent::setUp();

        $this->ship = new Ship();
    }

    /**
     * @test
     */
    public function ship_can_rotate_as_expected(): void
    {
        $this->ship->moveForward(1);
        $this->assertSame(1, $this->ship->getManhattanDistance());

        $this->ship->turnLeft(90);
        $this->ship->moveForward(1);
        $this->assertSame(2, $this->ship->getManhattanDistance());

        $this->ship->turnLeft(90);
        $this->ship->moveForward(1);
        $this->assertSame(1, $this->ship->getManhattanDistance());

        $this->ship->turnLeft(90);
        $this->ship->moveForward(1);
        $this->assertSame(0, $this->ship->getManhattanDistance());

        $this->ship->turnRight(90);
        $this->ship->moveForward(1);
        $this->assertSame(1, $this->ship->getManhattanDistance());

        $this->ship->turnRight(90);
        $this->ship->moveForward(1);
        $this->assertSame(2, $this->ship->getManhattanDistance());

        $this->ship->turnRight(90);
        $this->ship->moveForward(1);
        $this->assertSame(1, $this->ship->getManhattanDistance());

        $this->ship->turnRight(90);
        $this->ship->moveForward(1);
        $this->assertSame(0, $this->ship->getManhattanDistance());

        $this->ship->turnright(270);
        $this->ship->moveForward(1);
        $this->assertSame(1, $this->ship->getManhattanDistance());

        $this->ship->turnleft(270);
        $this->ship->moveForward(1);
        $this->assertSame(2, $this->ship->getManhattanDistance());
    }
}
