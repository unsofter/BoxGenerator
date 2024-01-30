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

        $this->cutLayer[] = new CuttingLine(0, 0, $this->boxSizes->L(), 0);
        $this->cutLayer[] = new CuttingLine($this->boxSizes->L(), 0, $this->boxSizes->L(), $this->boxSizes->W());
        $this->cutLayer[] = new CuttingLine($this->boxSizes->L(), $this->boxSizes->W(), 0, $this->boxSizes->W());
        $this->cutLayer[] = new CuttingLine(0, $this->boxSizes->W(), 0, 0);
    }
}