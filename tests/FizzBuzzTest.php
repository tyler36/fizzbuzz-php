<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Tyler36\FizzbuzzPhp\FizzBuzz;

/**
 * Class FizzBuzzTest.
 */
class FizzBuzzTest extends TestCase
{
  public function test_1を返します()
  {
    $this->assertEquals(1, FizzBuzz::say(1));
  }

  public function test_2を返します()
  {
    $this->assertEquals(2, FizzBuzz::say(2));
  }

  public function test_3の倍数の時には数の代わりに「Fizz」とプリントする()
  {
    foreach ([3, 6, 9, 12] as $num) {
      $this->assertEquals('Fizz', FizzBuzz::say($num));
    }
  }

  public function test_5の倍数の時には数の代わりに「Buzz」とプリントする()
  {
    foreach ([5, 10, 20, 50] as $num) {
      $this->assertEquals('Buzz', FizzBuzz::say($num));
    }
  }

  public function test_3と5両方の倍数の時には数の代わりに「FizzBuzz」とプリントする()
  {
    foreach ([15, 30, 45] as $num) {
      $this->assertEquals('FizzBuzz', FizzBuzz::say($num));
    }
  }
}
