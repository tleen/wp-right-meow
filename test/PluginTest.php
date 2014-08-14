<?php
/*
 * PHPUnit test for the wp-right-meow plugin
 */


define('WPINC', true);
function add_filter($filter, $function){ } // dummy WordPress hook

require dirname(__FILE__) . '/../plugin.php';

class PluginTest extends PHPUnit_Framework_TestCase
{
  function t($text){ return wp_right_meow_substitute($text); }

  public function testLowerCase()
  {
    $this->assertEquals(
      $this->t('This is now the text you know.'),
      'This is meow the text you know.'
    );

  }

  public function testUpperCase()
  {
    $this->assertEquals(
      $this->t('This is NOW the text you know.'),
      'This is MEOW the text you know.'
    );
  }

  public function testCapitalized()
  {
    $this->assertEquals(
      $this->t('This is Now the text you know.'),
      'This is Meow the text you know.'
    );
  }

  public function testOtherCases()
  {
    $this->assertEquals(
      $this->t('This is nOw the text you know.'),
      'This is meow the text you know.'
    );
  }

  public function testMixed()
  {
    $this->assertEquals(
      $this->t('meow now a Now NOW now know noW nOw NOW now.'),
      'meow meow a Meow MEOW meow know meow meow MEOW meow.'
    );
  }

}
