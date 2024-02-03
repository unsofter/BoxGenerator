<?php

namespace Fefco\Boxes01NN;

class FefcoBox0122 extends FefcoBox0121
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

        $this->linesBuilder->goTo(vLineOffset(), 0);
        $this->creaseLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->W());
    }
}