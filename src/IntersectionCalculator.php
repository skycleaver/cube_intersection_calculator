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

        if ($this->coordinatesDoNotIntersect($coordinate1, $coordinate2, $length1, $length2)) {
            return 0.0;
        }

        if ($this->oneSideOfTheCubeIsInsideTheOther(
            $coordinate1,
            $coordinate2,
            $length1,
            $length2
        )
        ) {
            return $length2;
        }
        if ($this->oneSideOfTheCubeIsInsideTheOther(
            $coordinate2,
            $coordinate1,
            $length2,
            $length1
        )
        ) {
            return $length1;
        }

        // rest of cases: the cubes intersect partially
        if ($coordinate1 > $coordinate2) {
            return abs(
                ($coordinate1 - $length1 / 2)
                -
                ($coordinate2 + $length2 / 2)
            );
        } else {
            return abs(
                ($coordinate2 - $length2 / 2)
                -
                ($coordinate1 + $length1 / 2)
            );
        }
    }

    private function coordinatesDoNotIntersect(
        float $coordinate1,
        float $coordinate2,
        float $length1,
        float $length2
    ): bool
    {
        return abs($coordinate1 - $coordinate2) >= ($length1 / 2 + $length2 / 2);
    }

    private function oneSideOfTheCubeIsInsideTheOther(
        float $coordinate1,
        float $coordinate2,
        float $length1,
        float $length2
    ): bool
    {
        return
            ($coordinate1 + $length1 / 2 > $coordinate2 + $length2 / 2)
            &&
            ($coordinate1 - $length1 / 2 < $coordinate2 - $length2 / 2);
    }
}