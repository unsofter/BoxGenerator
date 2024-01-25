<?php

namespace Fefco;

class FefcoBoxBase {

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

}