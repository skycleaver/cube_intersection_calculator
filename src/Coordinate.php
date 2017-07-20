<?php

namespace src;

class Coordinate
{
    /**
     * @var float
     */
    private $x;
    /**
     * @var float
     */
    private $y;
    /**
     * @var float
     */
    private $z;

    public function __construct(float $x, float $y, float $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function x(): float
    {
        return $this->x;
    }

    public function y(): float
    {
        return $this->y;
    }

    public function z(): float
    {
        return $this->z;
    }
}