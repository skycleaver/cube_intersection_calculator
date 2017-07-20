<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\Coordinate;
use src\Cube;
use src\IntersectionCalculator;

class CaculateIntersectionVolumeOfCollidingCubesTest extends TestCase
{
    public function testVolumeIsCorrectForCollidingCubesInXAxis()
    {
        $cube1 = new Cube(new Coordinate(0, 0, 0), 10);
        $cube2 = new Cube(new Coordinate(5, .0,0.0), 10);

        $intersectionCalculator = new IntersectionCalculator();
        $intersectionVolume = $intersectionCalculator->getIntersectionVolume($cube1, $cube2);

        $this->assertEquals(500.0, $intersectionVolume);
    }

    public function testVolumeIsCorrectForCollidingCubesInYAxis()
    {
        $cube1 = new Cube(new Coordinate(0, 0, 0), 10);
        $cube2 = new Cube(new Coordinate(0, 7, 0), 10);

        $intersectionCalculator = new IntersectionCalculator();
        $intersectionVolume = $intersectionCalculator->getIntersectionVolume($cube1, $cube2);

        $this->assertEquals(300.0, $intersectionVolume);
    }
}