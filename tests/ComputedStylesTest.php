<?php

namespace Tests;

use Baine\PhpComputedStyles\ComputedStyles;
use PHPUnit\Framework\TestCase;

class ComputedStylesTest extends TestCase
{

    function test_renders_to_string_correctly()
    {
        $styles = ComputedStyles::make([
            'display' => 'none',
            'color' => 'red'
        ]);
        $this->assertEquals("display: none; color: red;", '' . $styles);
    }
}
