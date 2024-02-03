<?php

namespace Fefco\Boxes01NN;

class FefcoBox0130 extends FefcoBox01NN {

    /**
     * @description Parts count
     * @var float
     */
    private float $N;

    public function __construct(float $W, float $L, float $N)
    {
        $this->N = $N;

        parent::__construct($W, $L);
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $fullL = $this->boxSizes->L() * $this->N;

        $this->cutLayer[] = $this->linesBuilder->lineToDX($fullL);
        $this->cutLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->W());
        $this->cutLayer[] = $this->linesBuilder->lineToDX((-1.0) * $fullL);
        $this->cutLayer[] = $this->linesBuilder->lineToDY((-1.0) * $this->boxSizes->W());

        for ($i = 0; $i < $this->N; $i++) {
            $this->linesBuilder->goTo($this->boxSizes->L() * $i, 0);
            $this->creaseLayer[] = $this->linesBuilder->lineToDY($this->boxSizes->W());
        }
    }
}