<?php

abstract class AbstractPerson
{

  protected $lastname;

  /**
   * @param $lastname
   */
  public function __construct($lastname)
  {
    $this->lastname = $lastname;
  }

  abstract protected function getTitle();

  public function getNameAndTitle()
  {
    return $this->getTitle() . ' ' . $this->lastname;
  }

}