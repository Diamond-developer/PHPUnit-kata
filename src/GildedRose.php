<?php

namespace App;

use InvalidArgumentException;

class GildedRose{

  private static $items=[
    'normal'=>Item::class,
    'Aged Brie'=>Brie::class,
    'Sulfuras, Hand of Ragnaros'=>Sulfuras::class,
    'Backstage passes to a TAKAL80ETC concert'=>BackstagePasses::class,
    'Conjured Mana Cake'=> Conjured::class
  ];
  
  public static function of($name, $quality, $sellIn){
    if(!array_key_exists($name,self::$items)){
      throw new InvalidArgumentException('Item type does not exits.');
    }

    $class=self::$items[$name];

    return new $class($quality, $sellIn);
  }
}