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
        parent::__construct($W, $L);
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        parent::createElements();

        $fullL = $this->L * $this->N;

        $this->cutLayer[] = new CuttingLine(0, 0, $fullL, 0);
        $this->cutLayer[] = new CuttingLine($fullL, 0, $fullL, $this->W);
        $this->cutLayer[] = new CuttingLine($fullL, $this->W, 0, $this->W);
        $this->cutLayer[] = new CuttingLine(0, $this->W, 0, 0);

        for ($i = 0; $i < $this->N; $i++) {
            $fullL = $this->L * $i;
            $this->creaseLayer[] = new CuttingLine($fullL, 0, $fullL, $this->W);
        }
    }
}