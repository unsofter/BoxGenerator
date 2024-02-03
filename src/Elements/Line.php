<?php

namespace Elements;

class Line
{
    /**
     * @var Point
     */
    protected Point $startPoint;

    /**
     * @var Point
     */
    protected Point $endPoint;

    /**
     * @param float $startX
     * @param float $startY
     * @param float $endX
     * @param float $endY
     */
    public function __construct(float $startX, float $startY, float $endX, float $endY)
    {
        $this->startPoint = new Point($startX, $startY);
        $this->endPoint = new Point($endX, $endY);
    }

    /**
     * @return Point
     */
    public function startPoint(): Point
    {
        return $this->startPoint;
    }

    /**
     * @return Point
     */
    public function endPoint(): Point
    {
        return $this->endPoint;
    }
}