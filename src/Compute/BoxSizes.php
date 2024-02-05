<?php

namespace BoxGenerator\Compute;

class BoxSizes {
    const __CUTOUT_WIDTH__ = 10.0; // mm
    const __GLUE_CUT_WIDTH__ = 10.0; // mm
    const __LINE_JUMP__ = 5.0; // mm

    /**
     * @description W size
     */
    private float $W;

    /**
     * @description L size
     */
    private float $L;

    /**
     * @description H size
     * @var float
     */
    private float $H;

    /**
     * @var float
     */
    private float $cutOut;

    /**
     * @var float
     */
    private float $glueCut;

    /**
     * @var float
     */
    private float $lineJump;

    /**
     * @param float $W
     * @param float $L
     * @param float $H
     */
    public function __construct(float $W = 0, float $L = 0, float $H = 0)
    {
        $this->W = $W;
        $this->L = $L;
        $this->H = $H;

        $this->cutOut = self::__CUTOUT_WIDTH__;
        $this->glueCut = self::__GLUE_CUT_WIDTH__;
        $this->lineJump = self::__LINE_JUMP__;
    }

    /**
     * @return float
     */
    public function W(): float
    {
        return $this->W;
    }

    /**
     * @return float
     */
    public function halfW(): float
    {
        return $this->W / 2;
    }

    /**
     * @return float
     */
    public function cutW(): float
    {
        return $this->W() - $this->cutOut();
    }

    /**
     * @return float
     */
    public function halfCutW(): float
    {
        return $this->W() - $this->halfCutOut();
    }

    /**
     * @return float
     */
    public function L(): float
    {
        return $this->L;
    }

    /**
     * @return float
     */
    public function halfL(): float
    {
        return $this->L / 2;
    }

    /**
     * @return float
     */
    public function H(): float
    {
        return $this->H;
    }

    /**
     * @return float
     */
    public function cutOut(): float
    {
        return $this->cutOut;
    }

    /**
     * @return float
     */
    public function halfCutOut(): float
    {
        return $this->cutOut / 2;
    }

    /**
     * @return float
     */
    public function glueCut(): float
    {
        return $this->glueCut;
    }

    /**
     * @return float
     */
    public function lineJump(): float
    {
        return $this->lineJump;
    }
}