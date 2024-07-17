<?php

namespace Tyler36\FizzbuzzPhp;

class FizzBuzz {
  public static function say($num) {
    if ($num % 3 === 0) {
      return 'Fizz';
    }

    return $num;
  }
}
