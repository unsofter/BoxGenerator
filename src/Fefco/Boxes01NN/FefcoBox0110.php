<?php

namespace Fefco\Boxes01NN;

use Elements\Lines\CuttingLine;

class FefcoBox0110 extends FefcoBox01NN {
    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $this->cutLayer[] = $this->linesBuilder->lineToDX($this->boxSizes->L(), CuttingLine::class);
        $this->cutLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->W(), CuttingLine::class);
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1.0) * $this->boxSizes->L(), CuttingLine::class);
        $this->cutLayer[] = $this->linesBuilder->lineToDY((-1.0) * $this->boxSizes->W(), CuttingLine::class);
    }
}