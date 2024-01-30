<?php

namespace  Fefco\Boxes01NN;

use Fefco\BoxSizes;
use Fefco\FefcoBoxBase;

class FefcoBox01NN extends FefcoBoxBase
{
    /**
     * @param float $W
     * @param float $L
     */
    public function __construct (float $W, float $L) {
        $this->boxSizes = new BoxSizes($W, $L);

        $this->createElements();
    }
}