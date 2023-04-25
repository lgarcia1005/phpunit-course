<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
  public function testAddReturnTheCorrectSum()
  {
    require_once 'function.php';

    $this->assertEquals(64, add(32, 32));
    $this->assertEquals(5, add(2, 3));
  }

  public function testAddDoesNotReturnTheIncorrectSump()
  {
    require_once 'function.php';

    $this->assertNotEquals(5, add(2, 2));
  }


}