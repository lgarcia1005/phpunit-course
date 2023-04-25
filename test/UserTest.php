<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
  public function testReturnFullName()
  {

    $user = new User();
    $user->first_name = "John";
    $user->last_name = "Doe";

    $this->assertEquals('John Doe', $user->getFullName());
  }

  public function testFullNameIsEmptyByDefault()
  {

    $user = new User();

    $this->assertEquals('', $user->getFullName());
  }

  /**
   * @return void
   * @test
   */
  public function user_has_first_name()
  {

    $user = new User();
    $user->first_name = "John";

    $this->assertEquals('John', $user->first_name);

  }

  public function testNotificationIsSent()
  {
    $user = new User();

    $mock_mailer = $this->createMock(Mailer::class);

    $mock_mailer->expects($this->once())
      ->method('sendMessage')
      ->with($this->equalTo('test@gmail.com'), $this->equalTo('Hello From User Class'))
      ->willReturn(true);

    $user->setMailer($mock_mailer);

    $user->email = 'test@gmail.com';

    $this->assertTrue($user->notify('Hello From User Class'));
  }


  public function testCannotNotifyUserWithNoEmail()
  {

    $user = new User();

    $mock_mailer = $this->getMockBuilder(Mailer::class)
      ->setMethods(null)
      ->getMock();

    $user->setMailer($mock_mailer);

    $this->expectException(Exception::class);

    $user->notify('Hello');


  }


}