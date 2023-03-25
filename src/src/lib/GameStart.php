<?php
require_once(__DIR__ . '/DrawCards.php');
require_once(__DIR__ . '/CardJudge.php');
require_once(__DIR__ . '/Player.php');
require_once(__DIR__ . '/Dealer.php');

class GameStart
{
    public $drawCards;
    public $cardJudge;
    public $player;
    public $dealer;
    

    public function __construct()
    {
        
        $this -> drawCards = new DrawCards();
        $this -> cardJudge = new CardJudge();
        $this -> player = new Player($this -> drawCards -> drawTwoCard());
        $this -> dealer = new Dealer($this -> drawCards -> drawTwoCard());
    }

    public function initialDrawByPlayer()
    {
        return $this -> player -> havingCards;
    }

    public function additionalDrawByPlayer()
    {
        $this -> player -> havingCards[] = $this -> drawCards -> drawOneCard();
        var_dump($this -> player -> havingCards);
    }

    public function initialDrawByDealer()
    {
        return $this -> dealer -> havingCards;
    }


}

$testClass = new GameStart();
$testClass -> initialDrawByPlayer();
$testClass -> additionalDrawByPlayer();