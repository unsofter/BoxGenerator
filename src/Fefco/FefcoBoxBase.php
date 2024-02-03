<?php

namespace Fefco;

use Compute\BoxSizes;
use Compute\LinesBuilder;
use Export\Layers;

class FefcoBoxBase implements Layers {
    /**
     * @var BoxSizes
     */
    protected BoxSizes $boxSizes;

    /**
     * @var LinesBuilder
     */
    protected LinesBuilder $linesBuilder;

    /**
     * @description All cutting elements
     * @var array
     */
    protected array $cutLayer;

    /**
     * @description All creasing elements
     * @var array
     */
    protected array $creaseLayer;

    /**
     * @description All perforation elements
     * @var array
     */
    protected array $perforationLayer;

    /**
     *
     */
    public function __construct(float $W, float $L)
    {
        $this->boxSizes = new BoxSizes($W, $L);
        $this->linesBuilder = new LinesBuilder();
    }

    /**
     * @description Create all box's elements
     * @return void
     */
    protected function createElements(): void
    {
        $this->cutLayer = [];
        $this->creaseLayer = [];
        $this->perforationLayer = [];
    }

    /**
     * @description Create SVG
     * @return string
     */
    public function SVG(): string
    {
        return "SVG_{$this->W}{$this->L}";
    }

    /**
     * @description Create DXF
     * @return string
     */
    public function DXF(): string
    {
        return "DXF{$this->W}{$this->L}";
    }

    /**
     * @return array
     */
    public function cutLayer(): array
    {
        return $this->cutLayer;
    }

    /**
     * @return array
     */
    public function creaseLayer(): array
    {
        return $this->creaseLayer;
    }

    /**
     * @return array
     */
    public function perforationLayer(): array
    {
        return $this->perforationLayer;
    }

    /**
     * @return float
     */
    public function Length(): float
    {
        $length = 0.0;

        foreach ($this->cutLayer() as $line)
            $length = ($line->endPoint->X() > $length)
                ? $line->endPoint->X()
                : $length;

        return $length;
    }

    /**
     * @return float
     */
    public function Width(): float
    {
        $width = 0.0;

        foreach ($this->cutLayer() as $line)
            $width = ($line->endPoint->Y() > $width)
                ? $line->endPoint->Y()
                : $width;

        return $width;
    }
}