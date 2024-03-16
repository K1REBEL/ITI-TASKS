<?php

use PHPUnit\Framework\TestCase;
require './src/Math.php';

class MathTest extends TestCase
{
    public function testFactorialZero()
    {
        $math = new Math();
        $result = $math->factorial(0);
        $this->assertEquals(1, $result);
    }

    public function testFactorialOne()
    {
        $math = new Math();
        $result = $math->factorial(1);
        $this->assertEquals(1, $result);
    }

    public function testFactorialFive()
    {
        $math = new Math();
        $result = $math->factorial(5);
        $this->assertEquals(120, $result);
    }

    public function testFactorialRandomInt()
    {
        $math = new Math();
        $randomInt = mt_rand(4, 50); 
        $expectedResult = $math->factorial($randomInt - 1) * $randomInt;
        $result = $math->factorial($randomInt);
        $this->assertEquals($expectedResult, $result);
    }

    public function testFactorialFloat()
    {
        $math = new Math();
        $result = $math->factorial(1.5);
        $this->assertNull($result);
    }

    public function testFactorialNegative()
    {
        $math = new Math();
        $result = $math->factorial(-1);
        $this->assertNull($result);
    }

    public function testFactorialFalse()
    {
        $math = new Math();
        $result = $math->factorial(false);
        $this->assertNull($result);
    }

    public function testFactorialString()
    {
        $math = new Math();
        $result = $math->factorial('xyz');
        $this->assertNull($result);
    }
}


?>