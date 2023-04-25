<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
  public function testAddingTwoPlusTwoEqualsFour()
  {
    $this->assertEquals(4, 2 + 2);
  }
}
