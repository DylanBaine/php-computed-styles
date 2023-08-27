<?php

namespace Baine\PhpComputedStyles;

use Baine\PhpComputedStyles\Abstracts\ComputesAttributes;

class ComputedStyles extends ComputesAttributes
{
    function toString(): string
    {
        $string = '';
        foreach ($this->values as $attribute => $value) {
            $string .= "$attribute: $value; ";
        }
        return trim($string);
    }
}
