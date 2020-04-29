<?php

namespace App;

class FizzBuzz
{
  public static function convert(int $number){
    $result ='';

    if (self::isDivisibleBythree($number)) {
      $result .= 'fizz';
    }

    if (self::isDivisibleByfive($number)) {
      $result .= 'buzz';
    }

    return $result ?: $number;
  }

  /**
   * @param int $number
   * @return bool
   *  
   */
  protected static function isDivisibleBythree(int $number):bool{
    return $number % 3 === 0;
  }
    
  /**
   * @param int $number
   * @return bool
   *  
   */
  protected static function isDivisibleByfive(int $number):bool{
    return $number % 5 === 0;
  }  
}