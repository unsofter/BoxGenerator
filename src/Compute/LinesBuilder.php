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
    public function lineToX(float $dX, string $lineClass): Line
    {
        $newX = $this->curPoint->X() + $dX;
        $line = new $lineClass($this->curPoint->X(), $this->curPoint->Y(), $newX, $this->curPoint->Y());
        $this->goTo($newX, $this->curPoint->Y());
        return  $line;
    }

    /**
     * @param float $dY
     * @return Line
     */
    public function lineToY(float $dY, string $lineClass): Line
    {
        $newY = $this->curPoint->Y() + $dY;
        $line = new $lineClass($this->curPoint->X(), $this->curPoint->Y(), $this->curPoint->X(), $newY);
        $this->goTo($this->curPoint->X(), $newY);
        return $line;
    }
}