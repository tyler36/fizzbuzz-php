<?php

namespace Tyler36\FizzbuzzPhp;

class FizzBuzz {
  public static function say($num) {
    $string = '';

    if ($num % 3 === 0) {
      $string .= 'Fizz';
    }

    if ($num % 5 === 0) {
      $string .= 'Buzz';
    }

    return $string
      ? $string
      : $num;
  }

  public static function list($last)
  {
    $list = '';

    foreach (range(1, $last) as $key => $value) {
      $list .= self::say($value) . PHP_EOL;
    }

    return $list;
  }
}
