<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $sum = 1 + 2;

        $this->assertEquals($sum,3);
    }
}
