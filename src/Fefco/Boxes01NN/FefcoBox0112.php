<?php

namespace Fefco\Boxes01NN;

use Elements\Lines\CreaseLine;

class FefcoBox0112 extends FefcoBox0111
{
    /**
     * @var float
     */
    protected float $v3;

    /**
     * @param float $W
     * @param float $L
     * @param float $v1
     * @param float $v2
     * @param float $v3
     */
    public function __construct(float $W, float $L, float $v1, float $v2, float $v3)
    {
        $this->v3 = $v3;

        parent::__construct($W, $L, $v1, $v2);
    }

    /**
     * @description Calculate v offset
     * @return float
     */
    protected function vLineOffset(): float {
        return $this->v1 + $this->v2;
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $this->creaseLayer[] = new CreaseLine(0,  $this->vLineOffset(), $this->boxSizes->L(), $this->vLineOffset());
    }
}