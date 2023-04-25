<?php

class Order
{
  public $amount = 0;

  protected $gateway;

  /**
   * @param $gateway
   */
  public function __construct(PaymentGateway $gateway)
  {
    $this->gateway = $gateway;
  }

  public function process()
  {
    return $this->gateway->charge($this->amount);
  }
}