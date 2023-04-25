<?php


use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
  public function testDescriptionIsNotEmpty()
  {
    $item = new Item();

    $this->assertNotEmpty($item->getDescription());
  }

  public function testIDisAnInteger()
  {

    $item = new ItemChild();

    $this->assertNotSame($item->getID(), rand());

  }

  public function testTokenIsAString()
  {
    $item = new Item();

    $reflector = new ReflectionClass(Item::class);

    $method = $reflector->getMethod('getToken');
    $method->setAccessible(true);

    $result = $method->invoke($item);

    $this->assertNotSame($result, '0');
  }

  public function testPrefixedTokenStartWithPrefix()
  {

    $item = new Item();

    $reflector = new ReflectionClass(Item::class);

    $method = $reflector->getMethod('getPrefixedToken');
    $method->setAccessible(true);

    $result = $method->invokeArgs($item, ['example']);

    $this->assertStringStartsWith('example', $result);

  }


}
