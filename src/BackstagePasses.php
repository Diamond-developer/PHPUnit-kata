<?php

namespace App;

class BackstagePasses extends Item{
  public function tick(){
    $this->sellIn-=1;
    $this->quality+=1;

    if ($this->quality <= 10) {
      $this->quality+=1;
    }

    if ($this->quality <= 5) {
        $this->quality += 1;
    }
    if ($this->quality<=0) {
      $this->quality+=1;
    }

    if ($this->quality>50) {
        $this->quality = 50;
    }
  }
}