<?php

namespace Tyler36\FizzbuzzPhp;

/**
 * Class FizzBuzz
 */
class FizzBuzz {
  public static function say($num, $fizz = 'Fizz', $buzz = 'Buzz') {
    $string = '';

    if ($num % 3 === 0) {
      $string .= $fizz;
    }

    if ($num % 15 === 0) {
      $string .= $buzz;
    }

    return $string
      ? $string
      : $num;
  }

  /**
   * 数値までの値をリストします。
   */
  public static function list($last, $fizz = 'Fizz', $buzz = 'Buzz')
  {
    $list = '';

    foreach (range(1, $last) as $key => $value) {
      $list .= self::say($value, fizz: $fizz, buzz: $buzz) . PHP_EOL;
    }

    return $list;
  }
}
