<?php

namespace Compute;

use Elements\Lines\Line;
use Elements\Point;

class LinesBuilder {
    /**
     * @var Point
     */
    private Point $curPoint;

    /**
     *
     */
    public function __construct()
    {
        $this->goTo(0.0, 0.0);
    }

    /**
     * @param float $X
     * @param float $Y
     * @return void
     */
    public function goTo(float $X, float $Y): void
    {
        unset($this->curPoint);
        $this->curPoint = new Point($X, $Y);
    }

    /**
     * @param float $dX
     * @return Line
     */
    public function lineToDX(float $dX, string $lineClass): Line
    {
        return $this->lineToDXY($dX, 0.0, $lineClass);
    }

    /**
     * @param float $dY
     * @return Line
     */
    public function lineToDY(float $dY, string $lineClass): Line
    {
        return $this->lineToDXY(0.0, $dY, $lineClass);
    }

    /**
     * @param float $dX
     * @param float $dY
     * @param string $lineClass
     * @return Line
     */
    public function lineToDXY(float $dX, float $dY, string $lineClass): Line
    {
        $newX = $this->curPoint->X() + $dX;
        $newY = $this->curPoint->Y() + $dY;
        $line = new $lineClass($this->curPoint->X(), $this->curPoint->Y(), $newX, $newY);
        $this->goTo($newX, $newY);
        return $line;
    }

    /**
     * @param float $dX
     * @param float $dY
     * @param string $lineClass
     * @return Line
     */
    public function lineTo(float $X, float $Y, string $lineClass): Line
    {
        $line = new $lineClass($this->curPoint->X(), $this->curPoint->Y(), $X, $Y);
        $this->goTo($X, $Y);
        return $line;
    }
}