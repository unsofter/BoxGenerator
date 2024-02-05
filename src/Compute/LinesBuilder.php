<?php

namespace BoxGenerator\Compute;

use BoxGenerator\Elements\Line;
use BoxGenerator\Elements\Point;

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
     * @return void
     */
    public function gotoDX(float $dX): void
    {
        $this->goTo($this->curPoint->X() + $dX, $this->curPoint->Y());
    }

    /**
     * @param float $dX
     * @return Line
     */
    public function lineToDX(float $dX): Line
    {
        return $this->lineToDXY($dX, 0.0);
    }

    /**
     * @param float $dY
     * @return Line
     */
    public function lineToDY(float $dY): Line
    {
        return $this->lineToDXY(0.0, $dY);
    }

    /**
     * @param float $dX
     * @param float $dY
     * @return Line
     */
    public function lineToDXY(float $dX, float $dY): Line
    {
        $newX = $this->curPoint->X() + $dX;
        $newY = $this->curPoint->Y() + $dY;
        $line = new Line($this->curPoint->X(), $this->curPoint->Y(), $newX, $newY);
        $this->goTo($newX, $newY);
        return $line;
    }

    /**
     * @param float $dX
     * @param float $dY
     * @return Line
     */
    public function lineTo(float $X, float $Y): Line
    {
        $line = new Line($this->curPoint->X(), $this->curPoint->Y(), $X, $Y);
        $this->goTo($X, $Y);
        return $line;
    }
}