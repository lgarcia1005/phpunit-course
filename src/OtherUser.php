<?php

class OtherUser extends OtherMailer
{

  public $email;

  protected $mailer;

  /**
   * @param mixed $mailer
   */
  public function setMailer(OtherMailer $mailer)
  {
    $this->mailer = $mailer;
  }

  /**
   * @param $email
   */
  public function __construct($email)
  {
    $this->email = $email;
  }


  public function notify(string $message)
  {
    return $this->mailer::send($this->email, $message);
  }


}