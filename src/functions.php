<?php

use Baine\PhpComputedStyles\ComputedClasses;
use Baine\PhpComputedStyles\ComputedStyles;

if (!function_exists('baine_computedClasses')) {
    function baine_computedClasses(array $values = []): ComputedClasses
    {
        return ComputedClasses::make($values);
    }
}

if (!function_exists('baine_computedStyles')) {
    function baine_computedStyles(array $values = []): ComputedStyles
    {
        return ComputedStyles::make($values);
    }
}
