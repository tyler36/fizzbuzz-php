<?php

namespace Tyler36\FizzbuzzPhp;

class FizzBuzz {
  public static function say($num) {
    if ($num % 15 === 0) {
      return 'FizzBuzz';
    }

    if ($num % 3 === 0) {
      return 'Fizz';
    }

    if ($num % 5 === 0) {
      return 'Buzz';
    }

    return $num;
  }
}
