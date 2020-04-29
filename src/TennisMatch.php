<?php

namespace App;

class TennisMatch
{
  protected $playerOnePoints = 0;
  protected $playerTwoPoints = 0;

  protected Player $playerOne;
  protected Player $playerTwo;

  public function __construct($playerOne, $playerTwo){
    $this->playerOne = $playerOne;
    $this->playerTwo = $playerTwo;
  }    

  public function score(){
    //check if we have a winner
    if($this->hasWinner()){
      
      return 'Winner: ' . $this->leader();
    }
    
    //check for advantage
    if ($this->hasAdvantage()) {
      return 'Advantage: ' . $this->leader();
    }
    
    if($this->isDeuce()){
      return 'deuce';
    }

    return sprintf(
      "%s-%s",
      $this->pointsToTerm($this->playerOnePoints),
      $this->pointsToTerm($this->playerTowPoints),
    );

  }

  public function pointToPlayerOne(){
    $this->playerOnePoints++;
  }
  
  public function pointToPlayerTwo(){
    $this->playerTwoPoints++;
  }

  public function pointTo(Player $player){
    $player->score();
  }

  protected function pointsToTerm($points){
    switch($points){
      case 0:
        return 'love';
      case 1:
        return 'fifteen';
      case 2:
        return 'thirty';
      case 3:
        return 'forty-love';
    }
  }

  /**
   * @return bool
   */
  protected function hasWinner(): bool{
    
    if( $this->playerOnePoints>3 && $this->playerOnePoints >= $this->playerTwoPoints + 2){
      return true;
    }

    if($this->playerTwoPoints>3 && $this->playerTwoPoints >= $this->playerOnePoints + 2){
      return true;
    }

    return false;
  }

  protected function leader():string{
    return $this->playerOnePoints > $this->playerTwoPoints ? $this->playerOne : $this->playerTwo;
  }

  protected function isDeuce():bool{

    $canBeWon=$this->canBeWon();
    
    return $canBeWon && $this->playerOnePoints === $this->playerTwoPoints;
  }

  protected function hasAdvantage(){

    if(! $this->canBeWon()){
      return false;
    }
    
    return false;
  }

  protected function canBeWon(){
    return $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3;
  }
}
