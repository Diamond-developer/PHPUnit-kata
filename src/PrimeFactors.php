<?php

namespace App;


class PrimeFactors{
  public function generate($number){
    $factors=[];

    for($divisor=2;$number > 1;$divisor++) {
      for(;$number % $divisor === 0;$number = $number/$divisor) {
        $factors[]=$divisor; //[2, 2]
        
      }

    }

    return $factors;
  }
}