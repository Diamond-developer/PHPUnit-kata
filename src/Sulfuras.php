<?php

namespace App;

class Sulfuras extends Item{
  public function tick(){
    $this->quality -= 1;
    $this->sellIn += 1;

    if ($this->sellIn<=0) {
      $this->quality+=1;
    }
    
    if ($this->quality < 0) {
      $this->quality =0;
    }
  }
}
