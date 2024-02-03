<?php

namespace Fefco\Boxes02NN;

class FefcoBox0200 extends FefcoBox02NN {
    /**
     * @return void
     */
    private function cutOutLines(): void
    {
        $this->cutLayer[] = $this->linesBuilder->lineToDY((-1) * $this->boxSizes->halfW());
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * $this->boxSizes->cutOut());
        $this->cutLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->halfW());
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();
        // Cut layer
        $this->cutLayer[] = $this->linesBuilder->lineToDX($this->boxSizes->W() * 2 + $this->boxSizes->L() * 2 + $this->boxSizes->glueCut());
        $this->cutLayer[] = $this->linesBuilder->lineToDY($this->H + $this->boxSizes->halfW());
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * $this->boxSizes->halfCutW());
        $this->cutOutLines();
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * ($this->boxSizes->L() - $this->boxSizes->cutOut()));
        $this->cutOutLines();
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * ($this->boxSizes->W() - $this->boxSizes->cutOut()));
        $this->cutOutLines();
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * ($this->boxSizes->L() - $this->boxSizes->cutOut()));
        $this->cutLayer[] = $this->linesBuilder->lineToDY((-1) * $this->boxSizes->halfW());
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1) * $this->boxSizes->cutOut());
        $this->cutLayer[] = $this->linesBuilder->lineToDXY((-1) * ($this->boxSizes->glueCut() - $this->boxSizes->halfCutOut()),
            (-1) * $this->boxSizes->lineJump());
        $this->cutLayer[] = $this->linesBuilder->lineTo(0, 0);

        // Crease Layer
        $this->linesBuilder->goTo($this->boxSizes->cutOut(), 0);
        $this->creaseLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->H());
        $this->linesBuilder->gotoDX($this->boxSizes->L());
        $this->creaseLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->H());
        $this->linesBuilder->gotoDX($this->boxSizes->W());
        $this->creaseLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->H());
        $this->linesBuilder->gotoDX($this->boxSizes->L());
        $this->creaseLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->H());
        $this->linesBuilder->goTo($this->boxSizes->cutOut(), $this->boxSizes->H());
        $this->creaseLayer[] = $this->linesBuilder->lineToDX($this->boxSizes->L() * 2 + $this->boxSizes->W() * 2);
    }

}