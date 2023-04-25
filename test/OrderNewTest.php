<?php


use PHPUnit\Framework\TestCase;

class OrderNewTest extends TestCase
{
  protected function tearDown()
  {
    \Mockery::close();
  }

  public function testOrderIsProcessedUsingMock()
  {

    $order = new OrderNew(3, 1.99);

    $this->assertEquals(5.97, $order->amount);

    $gateway = Mockery::mock('PaymentGateway');

    $gateway->allows('charge')->once()->with(5.97);

    $order->process($gateway);

  }

  public function testOrderIsProcessedUsingASpy()
  {

    $order = new OrderNew(3, 1.99);

    $this->assertEquals(5.97, $order->amount);

    $gateway = Mockery::spy('PaymentGateway');

    $order->process($gateway);

    $gateway->shouldHaveReceived('charge')->once()->with(5.97);

  }


}
