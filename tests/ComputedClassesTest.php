<?php

namespace Tests;

use Baine\PhpComputedStyles\ComputedClasses;
use PHPUnit\Framework\TestCase;

class ComputedClassesTest extends TestCase
{

    function test_renders_to_string_correctly()
    {
        $styles = ComputedClasses::make([
            'red',
            'green',
            'yellow' => false,
            'purple' => true
        ]);
        $this->assertEquals("red green purple", '' . $styles);
    }
}
