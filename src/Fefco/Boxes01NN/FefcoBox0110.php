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
        if ($W == 0.0)
            throw new BadRequestHttpException('W = 0?');
        if ($L == 0.0)
            throw new BadRequestHttpException('L = 0?');

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
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1.0) * $this->boxSizes->L());
        $this->cutLayer[] = $this->linesBuilder->lineToDY((-1.0) * $this->boxSizes->W());
    }
}