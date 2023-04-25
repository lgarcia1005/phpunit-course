<?php


use PHPUnit\Framework\TestCase;

class OtherUserTest extends TestCase
{
  protected function tearDown()
  {
    Mockery::close();
  }

  public function testNotifyReturnsTrue()
  {
    $user = new OtherUser('bob@gmail.com');

    $mock = Mockery::mock('alias:OtherMailer');

    $mock->shouldReceive('send')
      ->once()->with($user->email, 'Hello')
      ->andReturn(true);

      $this->assertTrue($user->notify('Hello There'));
  }


}
