<?php


use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
  public function testOrderIsProcessed()
  {

    $gateway = $this->getMockBuilder('PaymentGateway')
      ->setMethods(['charge'])
      ->getMock();

    $gateway->expects($this->once())
      ->method('charge')
      ->with($this->equalTo(200))
      ->willReturn(true);

    $order = new Order($gateway);

    $order->amount = 200;

    $this->assertTrue($order->process());

  }

  protected function tearDown()
  {
    \Mockery::close();
  }

  public function testOrderIsProcessedUsingMockery()
  {

    $gateway = Mockery::mock('PaymentGateway');

    $gateway->expects('charge')
      ->with(200)
      ->andReturns(true);

    $order = new Order($gateway);

    $order->amount = 200;

    $this->assertTrue($order->process());

  }


}
