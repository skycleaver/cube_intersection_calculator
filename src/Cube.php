<?php

namespace src;

class Cube
{
    /**
     * @var Coordinate
     */
    private $center;
    /**
     * @var float
     */
    private $length;

    public function __construct(Coordinate $center, float $length)
    {
        $this->center = $center;
        $this->length = $length;
    }

    public function centerX(): int {
        return $this->center->x();
    }

    public function centerY(): int {
        return $this->center->y();
    }

    public function centerZ(): int {
        return $this->center->z();
    }

    public function length(): int
    {
        return $this->length;
    }
}