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

        $this->cutLayer[] = new CuttingLine(0, 0, $this->L, 0);
        $this->cutLayer[] = new CuttingLine($this->L, 0, $this->L, $this->W);
        $this->cutLayer[] = new CuttingLine($this->L, $this->W, 0, $this->W);
        $this->cutLayer[] = new CuttingLine(0, $this->W, 0, 0);
    }
}