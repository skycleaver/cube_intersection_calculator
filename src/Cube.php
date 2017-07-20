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

    public function centerX(): float {
        return $this->center->x();
    }

    public function centerY(): float {
        return $this->center->y();
    }

    public function centerZ(): float {
        return $this->center->z();
    }

    public function length(): float
    {
        return $this->length;
    }
}