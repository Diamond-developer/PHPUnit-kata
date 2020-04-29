<?php

use App\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase{
  /** @test */
  function updates_normal_items_before_sell_date(){
    
    $item=GildedRose::of('normal',10 ,5);
    
    $item-> tick();

    $this->assertEquals(9, $item->quality);
    $this->assertEquals(4, $item->sellIn);
  }

  /** @test */
  function updates_normal_items_on_the__sell_date(){
    
    $item=GildedRose::of('normal',10 ,0);
    
    $item-> tick();

    $this->assertEquals(8, $item->quality);
    $this->assertEquals(-1, $item->sellIn);
    
  
  }
  
  /** @test */
  function updates_normal_items_with_a__quality_of_0(){
    
    $item=GildedRose::of('normal',0 ,5);
    
    $item-> tick();

    $this->assertEquals(0, $item->quality);
    $this->assertEquals(4, $item->sellIn);
  }

  /** @test */
  function updates_brie_items_before_the_sell_date(){
    
    $item=GildedRose::of('normal',10 ,5);
    
    $item-> tick();

    $this->assertEquals(11, $item->quality);
    $this->assertEquals(4, $item->sellIn);
  }

  /** @test */
  function updates_brie_items_before_the_sell_date_with_maximum_quality(){
    
    $item=GildedRose::of('normal',10 ,-5);
    
    $item-> tick();

    $this->assertEquals(8, $item->quality);
    $this->assertEquals(-6, $item->sellIn);
  }

  /** @test */
  function updates_normal_items_after_sell_date(){
    
    $item=GildedRose::of('Aged Brie',10 ,-10);
    
    $item-> tick();

    $this->assertEquals(12, $item->quality);
    $this->assertEquals(-11, $item->sellIn);
  }

  /** @test */
  function updates_normal_items_after_sell_date_with_maximum_quality(){
    
    $item=GildedRose::of('Aged Brie',50 ,-10);
    
    $item-> tick();

    $this->assertEquals(50, $item->quality);
    $this->assertEquals(-11, $item->sellIn);
  }

  /** @test */
  function updates_backstage_pass_items_long_before_the_sell_date(){
    
    $item=GildedRose::of('Backstage passes to a TAFKAL80ETF concert',10 ,11);
    
    $item-> tick();

    $this->assertEquals(11, $item->quality);
    $this->assertEquals(10, $item->sellIn);
  }
}