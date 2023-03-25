<?php

class Card{
    private $suit;
    private $value;
    function __construct($suit, $value){
        $this->suit = $suit;
        $this->value = $value;
    }
    public function getSuit(){
        return $this->suit;
    }
    public function getValue(){
        return $this->value;
    }
};

class Deck{
    public $cards;

    function __construct(){
        $this->cards = [];
        $suits = ['clubs', 'diamonds', 'hearts', 'spades'];
        $values = ['ace', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'jack', 'queen', 'king'];
        foreach($suits as $suit){
            foreach($values as $value){
                $this->cards[] = new Card($suit, $value);
            }
        }
    }
    public function shuffle(){
        shuffle($this->cards);
    }
    public function showCards(){
        foreach($this->cards as $card){
            echo $card->getSuit() . " " . $card->getValue() . PHP_EOL;
        }
    }
    public function getCards(){
        return $this->cards;
    }
}

class Hand{
    private $cards;
    function __construct($deck){
        $this->cards = [];
        for($i = 0; $i < 5; $i++){
            $this->cards[] = array_pop($deck->cards);
        }
    }
    public function showCards(){
        echo "Your hand is:" . PHP_EOL;
        foreach($this->cards as $card){
            echo $card->getSuit() . " " . $card->getValue() . PHP_EOL;
        }
    }
    public function dealCardsToPlayers($players){
        foreach($players as $player){
            for($i = 0; $i < 5; $i++){
                $player->cards[] = array_pop($this->cards);
            }
        }
    }
}

class Player{
    public $cards;
    public $hand;
    function __construct(){
        $this->cards = [];
    }
    public function showCards(){
        echo "Your hand is:" . PHP_EOL;
        foreach($this->cards as $card){
            echo $card->getSuit() . " " . $card->getValue() . PHP_EOL;
        }
    }

}

class Dealer{
    public $cards;
    public $hand;
    function __construct(){
        $this->cards = [];
    }
    public function showCards(){
        echo "Your hand is:" . PHP_EOL;
        foreach($this->cards as $card){
            echo $card->getSuit() . " " . $card->getValue() . PHP_EOL;
        }
    }
    public function deal(){
        $this->hand = new Hand($this);
    }
    public function dealCardsToPlayers($players){
        foreach($players as $player){
            for($i = 0; $i < 5; $i++){
                $player->cards[] = array_pop($this->cards);
            }
        }
    }
}


$deck = new Deck();

$deck->shuffle();
$deck->showCards();

$hand = new Hand($deck);
$hand->showCards();


     