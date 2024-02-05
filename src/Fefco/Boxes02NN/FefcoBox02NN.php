<?php

namespace BoxGenerator\Fefco\Boxes02NN;

use BoxGenerator\Fefco\Boxes01NN\FefcoBox01NN;

class FefcoBox02NN extends FefcoBox01NN {
    /**
     * @var float
     */
    protected float $H;

    /**
     * @param float $W
     * @param float $L
     * @param float $H
     */
    public function __construct(float $W, float $L, float $H)
    {
        $this->H = $H;

        parent::__construct($W, $L);
    }

}
