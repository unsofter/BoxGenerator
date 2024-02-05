<?php

namespace Unsofter\BoxGenerator\Fefco\Boxes01NN;

class FefcoBox0110 extends FefcoBox01NN {
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