<?php


use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
  public function testIDisAnInteger()
  {

    $product = new Product();

    $reflector = new ReflectionClass(Product::class);

    $property = $reflector->getProperty('product_id');
    $property->setAccessible(true);

    $value = $property->getValue($product);

    $this->assertGreaterThan(10, $value);

  }

}
