<?php

use PHPUnit\Framework\TestCase;
use App\RomanNumerals;

class RomanNumeralsTest extends TestCase
{
  function it_generates_the_roman_numeral_for_1($number,$numeral){
    $this->assertEquals($numeral,RomanNumerals::generate($number));
  }

  function it_cannot_generate_a_roman_numeral_for_less_than_1(){
    $this->assertFalse(RomanNumerals::generate(0));
  }

  function it_cannot_generate_a_roman_numeral_for_less_than_3999(){
    $this->assertFalse(RomanNumerals::generate(4000));
  }

  public function check(){
    return [
      [1,'I'],
      [2,'II'],
      [3,'III'],
      [4,'IV'],
      [5,'V'],
      [6,'VI'],
      [7,'VII'],
      [8,'VIII'],
      [9,'IX'],
      [10,'X'],
      [40,'XL'],
      [50,'L'],
      [90,'XC'],
      [100,'C'],
      [400,'CD'],
      [500,'D'],
      [900,'CM'],
      [1000,'M'],
      [3999,'MMMCM']
    ];
  }
}