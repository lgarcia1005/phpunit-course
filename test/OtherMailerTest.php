<?php


use PHPUnit\Framework\TestCase;

class OtherMailerTest extends TestCase
{
  public function testSendMessageReturnsTrue()
  {
    $this->assertTrue(OtherMailer::send('test@gmail.com', 'Hello'));
  }

  public function testInvalidArgsExceptionIfEmailIsEmpty()
  {

    $this->expectException(InvalidArgumentException::class);

    OtherMailer::send('','Hey');

  }


}
