<?php

namespace Export\SVG;

use Export\Export;
use Export\Layers;

class SVG extends Export
{
    /**
     * @param Layers $layers
     * @return string
     */
    public static function toString(Layers $layers): string
    {
        $length = $layers->Length();
        $width = $layers->Width();

        $SVG = '<?xml version="1.0" standalone="no"?>' . PHP_EOL .
               '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"' . PHP_EOL .
               '"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">' . PHP_EOL .
               '<svg width="' . $length . 'mm" height="' . $width . 'mm" version="1.1"' . PHP_EOL .
               'viewBox="0 0 ' . $length . ' ' . $width . '" xmlns="http://www.w3.org/2000/svg">' . PHP_EOL;

        foreach ($layers->cutLayer() as $cutLine)
            $SVG .= '<line x1="' . $cutLine->startPoint()->X() . '" y1="' . $cutLine->startPoint()->Y() .
                    '" x2="' . $cutLine->endPoint()->X() . '" y2="' . $cutLine->endPoint()->Y() . '" stroke="black" />' . PHP_EOL;

        foreach ($layers->creaseLayer() as $creaseLine)
            $SVG .= '<line x1="' . $creaseLine->startPoint()->X() . '" y1="' . $creaseLine->startPoint()->Y() .
                '" x2="' . $creaseLine->endPoint()->X() . '" y2="' . $creaseLine->endPoint()->Y() . '" stroke="black" />' . PHP_EOL;

        foreach ($layers->perforationLayer() as $perforationLine)
            $SVG .= '<line x1="' . $perforationLine->startPoint()->X() . '" y1="' . $perforationLine->startPoint()->Y() .
                '" x2="' . $perforationLine->endPoint()->X() . '" y2="' . $perforationLine->endPoint()->Y() . '" stroke="black" />' . PHP_EOL;

        $SVG .= '</svg>';

        return $SVG;
    }
}