<?php

require_once(__DIR__ . '/Deck.php');

//  $testclass = new drawCards();
//  var_dump($testclass -> deck);
//  echo 777777777777 . PHP_EOL;
//  var_dump($testclass -> drawTwoCard());

Class drawCards
{
    public $deck;
    public function __construct()
    {
        $Deck = new Deck();
        $this -> deck = $Deck -> cards;
    }

    public function drawOneCard()
    {
        $drawnCards = [];
        $drawnCard = array_shift($this -> deck);
        $drawnCards[] = $drawnCard;
        return $drawnCards;
    }
    public function drawTwoCard()
    {
        $drawnCards = [];
        $drawnCard = array_shift($this -> deck);
        $drawnCards[] = $drawnCard;
        $drawnCard = array_shift($this -> deck);
        $drawnCards[] = $drawnCard;
        return $drawnCards;
    }
    public function showCardsRecords()
    {
        return $this -> deck;
    }
}