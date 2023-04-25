<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

  protected static $queue;

  protected function setUp()
  {
    static::$queue->clear();
  }

  public static function setUpBeforeClass()
  {
    static::$queue = new Queue();
  }

  protected function tearDown()
  {

  }

  public static function tearDownAfterClass()
  {
    static::$queue = null;
  }

  public function testNewQueueIsEmpty()
  {

    $this->assertEquals(0, (static::$queue->getCount()));
  }

  public function testAnItemIsAddedToTheQueue()
  {
    static::$queue->push('green');

    $this->assertEquals(1, static::$queue->getCount());
  }

  public function testAnItemIsRemovedFromTheQueue()
  {
    static::$queue->push('green');

    $item = static::$queue->pop();

    $this->assertEquals(0, static::$queue->getCount());

    $this->assertEquals('green', $item);
  }

  public function testAnItemIsRemovedFromTheFrontOfTheQueue()
  {
    static::$queue->push('first');
    static::$queue->push('second');

    $this->assertEquals('first', static::$queue->shift());
  }

  public function testMaxNumberOfItemsCanBeAdded()
  {

    for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
      static::$queue->push($i);
    }

    $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
  }

  public function testExceptionThrownWhenAddingAnItemToAFullQueue()
  {
    for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
      static::$queue->push($i);
    }

    $this->expectException(QueueException::class);
    $this->expectExceptionMessage('Queue is full');
    $this->expectExceptionCode(405);

    static::$queue->push('items');
  }
}