<?php

namespace Export\SVG;

use Export\Export;
use Export\Layers;

class SVG extends Export
{
    /**
     * @param float $length
     * @param float $width
     * @return string
     */
    private static function header(float $length, float $width): string
    {
        return '<?xml version="1.0" standalone="no"?>' . PHP_EOL .
            '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"' . PHP_EOL .
            '"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">' . PHP_EOL .
            '<svg width="' . $length . 'mm" height="' . $width . 'mm" version="1.1"' . PHP_EOL .
            'viewBox="0 0 ' . $length . ' ' . $width . '" xmlns="http://www.w3.org/2000/svg">' . PHP_EOL;
    }

    /**
     * @param array $cutLayer
     * @return string
     */
    private static function cutLayer(array $cutLayer): string
    {
        $lines = '';

        foreach ($cutLayer as $cutLine)
            $lines .= '<line x1="' . $cutLine->startPoint()->X() . '" y1="' . $cutLine->startPoint()->Y() .
                '" x2="' . $cutLine->endPoint()->X() . '" y2="' . $cutLine->endPoint()->Y() . '" stroke="black" />' . PHP_EOL;

        return $lines;
    }

    /**
     * @param array $creaseLayer
     * @return string
     */
    private static function creaseLayer(array $creaseLayer): string
    {
        $lines = '';

        foreach ($creaseLayer as $creaseLine)
            $lines .= '<line x1="' . $creaseLine->startPoint()->X() . '" y1="' . $creaseLine->startPoint()->Y() .
                '" x2="' . $creaseLine->endPoint()->X() . '" y2="' . $creaseLine->endPoint()->Y() . '" stroke="black" />' . PHP_EOL;

        return $lines;
    }

    /**
     * @param array $perforationLayer
     * @return string
     */
    private static function perforationLayer(array $perforationLayer): string
    {
        $lines = '';

        foreach ($perforationLayer as $perforationLine)
            $lines .= '<line x1="' . $perforationLine->startPoint()->X() . '" y1="' . $perforationLine->startPoint()->Y() .
                '" x2="' . $perforationLine->endPoint()->X() . '" y2="' . $perforationLine->endPoint()->Y() . '" stroke="black" />' . PHP_EOL;

        return $lines;
    }

    /**
     * @return string
     */
    private static function footer(): string
    {
        return '</svg>';
    }

    /**
     * @param Layers $layers
     * @return string
     */
    public static function toString(Layers $layers): string
    {
        return self::header($layers->Length(), $layers->Width()) .
               self::cutLayer($layers->cutLayer()) .
               self::creaseLayer($layers->creaseLayer()) .
               self::perforationLayer($layers->perforationLayer()) .
               self::footer();
    }
}