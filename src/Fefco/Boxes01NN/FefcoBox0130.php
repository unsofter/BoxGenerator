<?php

namespace Fefco\Boxes01NN;

use Elements\Lines\CreaseLine;
use Elements\Lines\CuttingLine;

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

        $this->cutLayer[] = new CuttingLine(0, 0, $fullL, 0);
        $this->cutLayer[] = new CuttingLine($fullL, 0, $fullL, $this->boxSizes->W());
        $this->cutLayer[] = new CuttingLine($fullL, $this->boxSizes->W(), 0, $this->boxSizes->W());
        $this->cutLayer[] = new CuttingLine(0, $this->boxSizes->W(), 0, 0);

        for ($i = 0; $i < $this->N; $i++) {
            $fullL = $this->boxSizes->L() * $i;
            $this->creaseLayer[] = new CreaseLine($fullL, 0, $fullL, $this->boxSizes->W());
        }
    }
}