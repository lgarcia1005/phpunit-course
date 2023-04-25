<?php


use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
  protected function tearDown()
  {
    \Mockery::close();
  }

  public function testCorrectAverageIsReturned()
  {

    $service = $this->createMock(TemperatureService::class);

    $map = [
      ['12:00', 20],
      ['14:00', 26],
    ];

    $service->expects($this->exactly(2))
      ->method('getTemperature')
      ->will($this->returnValueMap($map));


    $weather = new WeatherMonitor($service);

    $temp = $weather->getAverageTemperature('12:00', '14:00');

    $this->assertEquals(23, $temp);

  }

  public function testCorrectAverageIsReturnedWithMockery()
  {

    $service = Mockery::mock(TemperatureService::class);

    $service->expects('getTemperature')->once()->with('12:00')->andReturn(20);
    $service->expects('getTemperature')->once()->with('14:00')->andReturn(26);

    $weather = new WeatherMonitor($service);

    $temp = $weather->getAverageTemperature('12:00', '14:00');

    $this->assertEquals(23, $temp);

  }


}
