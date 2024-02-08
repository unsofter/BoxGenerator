<?php

namespace BoxGenerator\Export\DXF;

use BoxGenerator\Export\Export;
use BoxGenerator\Export\Layers;

class DXF extends Export
{

    /**
     * @param array $cutLayer
     * @return string
     */
    private static function cutLayer(array $cutLayer): string
    {
        return 'D';
    }

    /**
     * @param array $creaseLayer
     * @return string
     */
    private static function creaseLayer(array $creaseLayer): string
    {
        return 'X';
    }

    /**
     * @param array $perforationLayer
     * @return string
     */
    private static function perforationLayer(array $perforationLayer): string
    {
        return 'F';
    }

    /**
     * @param Layers $layers
     * @return string
     */
    public static function toString(Layers $layers): string
    {
        return self::cutLayer($layers->cutLayer()) .
            self::creaseLayer($layers->creaseLayer()) .
            self::perforationLayer($layers->perforationLayer());
    }
}