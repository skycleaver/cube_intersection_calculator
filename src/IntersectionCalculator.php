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
        $sumOfHalfLengths = $cube1->length() / 2 + $cube2->length() / 2;

        return
            ($sumOfHalfLengths - abs($cube1->centerX() - $cube2->centerX())) *
            ($sumOfHalfLengths - abs($cube1->centerY() - $cube2->centerY())) *
            ($sumOfHalfLengths - abs($cube1->centerZ() - $cube2->centerZ()));
    }
}