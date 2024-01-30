<?php

namespace Fefco\Boxes01NN;

use Elements\Lines\CreaseLine;

class FefcoBox0113 extends FefcoBox0112
{
    /**
     * @var float
     */
    protected float $v4;

    /**
     * @param float $W
     * @param float $L
     * @param float $v1
     * @param float $v2
     * @param float $v3
     * @param float $v4
     */
    public function __construct(float $W, float $L, float $v1, float $v2, float $v3, float $v4)
    {
        $this->v4 = $v4;

        parent::__construct($W, $L, $v1, $v2, $v3);
    }

    /**
     * @description Calculate v offset
     * @return float
     */
    protected function vLineOffset(): float {
        return parent::vLineOffset() + $this->v3;
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $this->creaseLayer[] = new CreaseLine(0, $this->vLineOffset(), $this->boxSizes->L(), $this->vLineOffset());
    }
}