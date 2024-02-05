<?php

namespace Unsofter\BoxGenerator\Fefco\Boxes01NN;

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
     * @description Calculate v offset
     * @return float
     */
    protected function vLineOffset(): float {
        return parent::vLineOffset() + $this->v4;
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $this->linesBuilder->goTo(0, $this->vLineOffset());
        $this->creaseLayer[] = $this->linesBuilder->lineToDX($this->boxSizes->L());
    }
}