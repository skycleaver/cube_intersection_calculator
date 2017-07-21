<?php

namespace src;

interface CubeIntersectionCalculatorInterface
{
    public function getIntersectionVolume(Cube $cube1, Cube $cube2): float;
}