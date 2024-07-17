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
}
