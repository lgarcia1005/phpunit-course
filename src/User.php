<?php

class User
{

  public $first_name, $last_name, $email;

  protected $mailer;

  /**
   * @param mixed $mailer
   */
  public function setMailer(Mailer $mailer)
  {
    $this->mailer = $mailer;
  }

  public function getFullName()
  {
    return trim("$this->first_name $this->last_name");
  }

  public function notify($message)
  {
    return $this->mailer->sendMessage($this->email, $message);
  }

}