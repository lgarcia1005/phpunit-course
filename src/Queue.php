<?php

class Queue
{

  protected $items = [];
  const MAX_ITEMS = 5;

  /**
   * @throws \QueueException
   */
  public function push($item)
  {

    if ($this->getCount() == static::MAX_ITEMS) {
      throw new \QueueException("Queue is full", 405);
    }

    $this->items[] = $item;
  }

  public function pop()
  {
    return array_pop($this->items);
  }

  public function shift()
  {
    return array_shift($this->items);
  }

  public function getCount()
  {
    return count($this->items);
  }

  public function clear()
  {
    $this->items = [];
  }

}