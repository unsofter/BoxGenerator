<?php

namespace  BoxGenerator\Fefco\Boxes01NN;

use BoxGenerator\Fefco\FefcoBoxBase;

class FefcoBox01NN extends FefcoBoxBase
{
    /**
     * @param float $W
     * @param float $L
     */
    public function __construct (float $W, float $L) {
        parent::__construct($W, $L);

        $this->createElements();
    }
}