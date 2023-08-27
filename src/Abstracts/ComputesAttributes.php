<?php

namespace Baine\PhpComputedStyles\Abstracts;

use Stringable;

abstract class ComputesAttributes implements Stringable
{

    abstract function toString(): string;

    function __construct(
        protected array $values = []
    ) {
    }

    static function make(array $values = []): static
    {
        return new static($values);
    }

    function push(array $values): static
    {
        foreach ($values as $key => $value) {
            if (is_string($key)) {
                $this->values[$key] = $value;
            } else {
                $this->values[] = $value;
            }
        }
        return $this;
    }

    function when($variable, array $values): static
    {
        if ($variable) {
            $this->push($values);
        }
        return $this;
    }

    function whenNot($variable, array $values): static
    {
        if (!$variable) {
            $this->push($values);
        }
        return $this;
    }

    function __toString(): string
    {
        return $this->toString();
    }
}
