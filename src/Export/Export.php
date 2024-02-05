<?php

namespace BoxGenerator\Export;

abstract class Export
{
    /**
     * @param Layers $layers
     * @return string
     */
    public static abstract function toString(Layers $layers): string;
}