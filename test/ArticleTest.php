<?php


use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
  protected $article;

  public function testTitleIsEmptyByDefault()
  {
    $this->assertEmpty($this->article->title);
  }

  public function testSlugIsEmptyWithNoTitle()
  {
    $this->assertSame($this->article->getSlug(), "");
  }

  protected function setUp()
  {
    $this->article = new App\Article();
  }

  public function titleProvider()
  {
    return [
      "Slug Has Spaces Replaced By Underscores" => ["A Test With Many Spaces", "A_Test_With_Many_Spaces"],
      "Slug Does Not Start Or End With An Underscore" => [" A Test With Many Spaces ", "A_Test_With_Many_Spaces"],
      "Slug Has White Space Replaced By Single Underscore " => ["A Test With  Many \n Spaces", "A_Test_With_Many_Spaces"],
      "Slug Does Not Have Any Non Word Character" => ["Read! This! Now!", "Read_This_Now"]
    ];
  }

  /**
   * @dataProvider titleProvider
   */
  public function testSlug($title, $slug)
  {
    $this->article->title = $title;

    $this->assertEquals($this->article->getSlug(), $slug);
  }


}
