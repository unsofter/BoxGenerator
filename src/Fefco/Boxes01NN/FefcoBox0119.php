<?php

namespace Fefco\Boxes01NN;

use Elements\Lines\CreaseLine;
use Elements\Lines\PerforationLine;

class FefcoBox0119 extends FefcoBox0113
{
    /**
     * @var float
     */
    protected float $vn;

    /**
     * @param float $W
     * @param float $L
     * @param float $v1
     * @param float $v2
     * @param float $v3
     * @param float $v4
     * @param float $vn
     */
    public function __construct(float $W, float $L, float $v1, float $v2, float $v3, float $v4, float $vn)
    {
        $this->vn = $vn;

        parent::__construct($W, $L, $v1, $v2, $v3, $v4);
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $vnLineY = $this->v1 + $this->v2 + $this->v3 + $this->v4;
        $this->perforationLayer[] = new PerforationLine(0,  $vnLineY, $this->L, $vnLineY);
    }
}