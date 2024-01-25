<?php

namespace  Fefco\Boxes01NN;

use Fefco\FefcoBoxBase;

class FefcoBox01NN extends FefcoBoxBase
{
    /**
     * @description W size
     */
    protected float $W;

    /**
     * @description L size
     */
    protected float $L;

    /**
     * @param float $W
     * @param float $L
     */
    public function __construct (float $W, float $L) {
        $this->W = $W;
        $this->L = $L;

        $this->createElements();
    }
}