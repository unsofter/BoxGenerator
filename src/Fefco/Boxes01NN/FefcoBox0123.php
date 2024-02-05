<?php

namespace Unsofter\BoxGenerator\Fefco\Boxes01NN;

class FefcoBox0123 extends FefcoBox0122
{
    /**
     * @var float
     */
    protected float $v4;

    /**
     * @param float $W
     * @param float $L
     * @param float $v1
     * @param float $v2
     * @param float $v3
     * @param float $v4
     */
    public function __construct(float $W, float $L, float $v1, float $v2, float $v3, float $v4)
    {
        $this->v4 = $v4;

        parent::__construct($W, $L, $v1, $v2, $v3);
    }

    /**
     * @description Calculate v offset
     * @return float
     */
    protected function vLineOffset(): float
    {
        return parent::vLineOffset() + $this->v3;
    }

}