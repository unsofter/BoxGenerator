<?php

namespace Fefco\Boxes02NN;

use Elements\Lines\CuttingLine;

class FefcoBox0200 extends FefcoBox02NN {
    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $currentL = $this->boxSizes->W() * 2 + $this->boxSizes->L() * 2 + $this->boxSizes->glueCut();
        $fullH = $this->H + $this->boxSizes->halfW();

        $this->cutLayer[] = new CuttingLine(0, 0, $currentL, 0);
        $this->cutLayer[] = new CuttingLine($currentL, 0, $currentL, $fullH);
        $this->cutLayer[] = new CuttingLine($currentL, $fullH, $currentL - $this->boxSizes->halfCutW(), $fullH);
        $currentL = $currentL - $this->boxSizes->halfCutW();
        $this->cutLayer[] = new CuttingLine($currentL, $fullH, $currentL, $fullH - $this->boxSizes->halfW());
        $this->cutLayer[] = new CuttingLine($currentL, $fullH - $this->boxSizes->halfW(), $currentL - $this->boxSizes->cutOut(), $fullH - $this->boxSizes->halfW());
    }

}