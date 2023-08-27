<?php

namespace Baine\PhpComputedStyles;

use Baine\PhpComputedStyles\Abstracts\ComputesAttributes;

class ComputedClasses extends ComputesAttributes
{
    function toString(): string
    {
        $values = [];
        foreach ($this->values as $key => $val) {
            if (is_bool($val)) {
                if ($val) {
                    $values[] = $key;
                }
            } else {
                $values[] = $val;
            }
        }
        return trim(implode(' ', $values));
    }
}
