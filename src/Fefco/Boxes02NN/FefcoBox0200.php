<?php

namespace Fefco\Boxes02NN;

use Elements\Lines\CuttingLine;

class FefcoBox0200 extends FefcoBox02NN {
    /**
     * @return void
     */
    private function cutOutLines(): void
    {
        // /\
        $this->cutLayer[] = $this->linesBuilder->lineToDY((-1) * $this->boxSizes->halfW(), CuttingLine::class);
        // <-
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * $this->boxSizes->cutOut(), CuttingLine::class);
        // \/
        $this->cutLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->halfW(), CuttingLine::class);
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();
        // Cut layer
        // ->
        $this->cutLayer[] = $this->linesBuilder->lineToDX($this->boxSizes->W() * 2 + $this->boxSizes->L() * 2 + $this->boxSizes->glueCut(), CuttingLine::class);
        // \/
        $this->cutLayer[] = $this->linesBuilder->lineToDY($this->H + $this->boxSizes->halfW(), CuttingLine::class);
        // <- W
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * $this->boxSizes->halfCutW(), CuttingLine::class);
        // cutout
        $this->cutOutLines();
        // <- L
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * ($this->boxSizes->L() - $this->boxSizes->cutOut()), CuttingLine::class);
        // cutout
        $this->cutOutLines();
        // <- W
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * ($this->boxSizes->W() - $this->boxSizes->cutOut()), CuttingLine::class);
        // cutout
        $this->cutOutLines();
        // <- L
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * ($this->boxSizes->L() - $this->boxSizes->cutOut()), CuttingLine::class);
        // /\ L
        $this->cutLayer[] = $this->linesBuilder->lineToDY((-1) * $this->boxSizes->halfW(), CuttingLine::class);
        // <-
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * $this->boxSizes->cutOut(), CuttingLine::class);
        // \
        $this->cutLayer[] = $this->linesBuilder->lineToDXY((-1) * ($this->boxSizes->glueCut() - $this->boxSizes->halfCutOut()),
            (-1) * $this->boxSizes->lineJump(), CuttingLine::class);
        // /\
        $this->cutLayer[] = $this->linesBuilder->lineTo(0, 0, CuttingLine::class);

        // Crease Layer
        
    }

}