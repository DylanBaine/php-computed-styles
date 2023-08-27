<?php

namespace Tests;

use Baine\PhpComputedStyles\Abstracts\ComputesAttributes;
use PHPUnit\Framework\TestCase;

class ComputesStylesFixture extends ComputesAttributes
{
    function toString(): string
    {
        return json_encode($this->values);
    }
}

class ComputesAttributesTest extends TestCase
{

    function test_push()
    {
        $styles = ComputesStylesFixture::make([
            'display' => 'none'
        ]);
        $styles->push([
            'opacity' => '0',
            'color' => 'green'
        ]);
        $this->assertEquals(json_encode([
            'display' => 'none',
            'opacity' => '0',
            'color' => 'green'
        ]), '' . $styles);
    }

    function test_matches_string_keys_but_not_empty_or_number_ones()
    {
        $styles = ComputesStylesFixture::make([
            'a'
        ])->push([
            'a',
            'val' => 'a'
        ]);
        $this->assertEquals(json_encode([
            'a',
            'a',
            'val' => 'a'
        ]), '' . $styles);
    }

    function test_when_with_true_pushes_styles()
    {
        $styles = ComputesStylesFixture::make([
            'display' => 'none'
        ])->when(true, [
            'opacity' => '0',
            'color' => 'green'
        ]);

        $this->assertEquals(json_encode([
            'display' => 'none',
            'opacity' => '0',
            'color' => 'green'
        ]), '' . $styles);
    }

    function test_when_with_false_doesnt_push_styles()
    {
        $styles = ComputesStylesFixture::make([
            'display' => 'none'
        ])->when(false, [
            'opacity' => '0',
            'color' => 'green'
        ]);

        $this->assertEquals(json_encode([
            'display' => 'none'
        ]), '' . $styles);
    }

    function test_whenNot_with_true_doesnt_push_styles()
    {
        $styles = ComputesStylesFixture::make([
            'display' => 'none'
        ])->whenNot(false, [
            'opacity' => '0',
            'color' => 'green'
        ]);

        $this->assertEquals(json_encode([
            'display' => 'none',
            'opacity' => '0',
            'color' => 'green'
        ]), '' . $styles);
    }

    function test_whenNot_with_false_pushes_styles()
    {
        $styles = ComputesStylesFixture::make([
            'display' => 'none'
        ])->whenNot(true, [
            'opacity' => '0',
            'color' => 'green'
        ]);

        $this->assertEquals(json_encode([
            'display' => 'none'
        ]), '' . $styles);
    }
}
