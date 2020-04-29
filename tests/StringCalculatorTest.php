<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase{
  /** @Test */
  function it_evaluates_an_empty_string_as_0(){
    $calculator=new StringCalculator();

    $this->assertEquals(0, $calculator->add(''));
  }

  /** @Test */
  function it_finds_the_sum_of_a_single_number(){
    $calculator=new StringCalculator();

    $this->assertEquals(5, $calculator->add('5'));
  }

  /** @Test */
  function it_finds_the_sum_of_two_number(){
    $calculator=new StringCalculator();

    $this->assertEquals(10, $calculator->add('5,5'));
  }

  /** @Test */
  function it_finds_the_sum_of_any_amount_of_number(){
    $calculator=new StringCalculator();

    $this->assertEquals(19, $calculator->add('5,5,5,4'));
  }

  /** @Test */
  function it_accepts_a_new_line_character_as_a_delimiter_too(){
    $calculator=new StringCalculator();

    $this->assertEquals(10, $calculator->add('5\n5'));
  }

  /** @Test */
  function negative_numbers_are_not_allowed(){
    $calculator=new StringCalculator();

    $this->expectException(\Exception::class);

    $calculator->add('5,-4');
  }

  /** @Test */
  function numbers_greater_than_1000_ignored(){
    $calculator=new StringCalculator();

    $this->assertEquals(5, $calculator->add('5,1001'));
  }

  /** @Test */
  function it_supports_custom_delimiters(){
    $calculator=new StringCalculator();

    $this->assertEquals(20, $calculator->add("//:\n5:4:11"));
  }
}