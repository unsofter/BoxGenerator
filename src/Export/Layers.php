<?php

namespace BoxGenerator\Export;

interface Layers
{
    /**
     * @return array
     */
    public function cutLayer(): array;

    /**
     * @return array
     */
    public function creaseLayer(): array;

    /**
     * @return array
     */
    public function perforationLayer(): array;

    /**
     * @return float
     */
    public function Length(): float;

    /**
     * @return float
     */
    public function Width(): float;
}