<?php

namespace Elements;

class Point
{
    /**
     * @description X coordinate
     * @var float
     */
    private float $X;

    /**
     * @description Y coordinate
     * @var float
     */
    private float $Y;

    /**
     * @param float $X
     * @param float $Y
     */
    public function __construct (float $X, float $Y)
    {
        $this->X = $X;
        $this->Y = $Y;
    }

    /**
     * @return float
     */
    public function X(): float
    {
        return $this->X;
    }

    /**
     * @return float
     */
    public function Y(): float
    {
        return $this->Y;
    }
}