<?php

namespace Fefco\Boxes01NN;

class FefcoBox0111 extends FefcoBox0110
{
    /**
     * @var float
     */
    protected float $v1;

    /**
     * @var float
     */
    protected float $v2;

    /**
     * @param float $W
     * @param float $L
     * @param float $v1
     * @param float $v2
     */
    public function __construct(float $W, float $L, float $v1, float $v2)
    {
        $this->v1 = $v1;
        $this->v2 = $v2;

        parent::__construct($W, $L);
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $this->linesBuilder->goTo(0, $this->v1);
        $this->creaseLayer[] = $this->linesBuilder->lineToDX($this->boxSizes->L());
    }
}