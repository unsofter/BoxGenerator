<?php

namespace BoxGenerator\Fefco\Boxes01NN;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FefcoBox0110 extends FefcoBox01NN {
    /**
     * @param float $W
     * @param float $L
     */
    public function __construct(float $W, float $L)
    {
        parent::__construct($W, $L);
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $this->cutLayer[] = $this->linesBuilder->lineToDX($this->boxSizes->L());
        $this->cutLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->W());
        $this->cutLayer[] = $this->linesBuilder->lineTo(0.0, $this->boxSizes->W());;
        $this->cutLayer[] = $this->linesBuilder->lineTo(0.0, 0.0);
    }
}