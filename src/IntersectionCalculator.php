<?php

namespace src;

class IntersectionCalculator
{

    /**
     * IntersectionCalculator constructor.
     */
    public function __construct()
    {
    }

    public function getIntersectionVolume(Cube $cube1, Cube $cube2): float
    {
        $intersectionX = $this->getCoordinateIntersection(
            $cube1->centerX(),
            $cube2->centerX(),
            $cube1->length(),
            $cube2->length()
        );
        $intersectionY = $this->getCoordinateIntersection(
            $cube1->centerY(),
            $cube2->centerY(),
            $cube1->length(),
            $cube2->length()
        );
        $intersectionZ = $this->getCoordinateIntersection(
            $cube1->centerZ(),
            $cube2->centerZ(),
            $cube1->length(),
            $cube2->length()
        );

        return $intersectionX * $intersectionY * $intersectionZ;
    }

    private function getCoordinateIntersection(
        float $coordinate1,
        float $coordinate2,
        float $length1,
        float $length2
    ): float
    {
        // direct case: the cubes don't intersect with each other
        if (
            abs($coordinate1 - $coordinate2)
            >=
            ($length1 / 2 + $length2 / 2)
        ) {
            return 0.0;
        }

        // direct case: one of the sides of a cube is inside the other
        if (
            ($coordinate1 + $length1 / 2 > $coordinate2 + $length2 / 2)
            &&
            ($coordinate1 - $length1 / 2 < $coordinate2 - $length2 / 2)
        ) {
            return $length2;
        }
        if (
            ($coordinate2 + $length2 / 2 > $coordinate1 + $length1 / 2)
            &&
            ($coordinate2 - $length2 / 2 < $coordinate1 - $length1 / 2)
        ) {
            return $length1;
        }

        // rest of cases: the cubes intersect partially
        if ($coordinate1 > $coordinate2) {
            $intersectionCoordinate = abs(
                ($coordinate1 - $length1 / 2)
                -
                ($coordinate2 + $length2 / 2)
            );
        } else {
            $intersectionCoordinate = abs(
                ($coordinate2 - $length2 / 2)
                -
                ($coordinate1 + $length1 / 2)
            );
        }

        return $intersectionCoordinate;
    }
}