<?php
require_once(__DIR__ . '/DrawCards.php');
require_once(__DIR__ . '/CardJudge.php');
require_once(__DIR__ . '/Player.php');
require_once(__DIR__ . '/Dealer.php');

  $testclass = new GameStart();
//   var_dump($testclass -> dealer -> havingCards);
//   echo '1111111111111111111111' . PHP_EOL;
//var_dump($testclass -> dealerResult);

class GameStart
{
    public $drawCards;
    public $cardJudge;
    public $player;
    public $dealer;
    public $temp;
    public $dealerResult;
    public $PlayerResult;
    

    public function __construct()
    {
        
        $this -> drawCards = new DrawCards();
        $this -> cardJudge = new CardJudge();
        $this -> player = new Player($this -> drawCards -> drawTwoCard());
        $this -> dealer = new Dealer($this -> drawCards -> drawTwoCard());
        
        //done with dealer cards. s
        $this -> DrawByDealer();

        //Show Player cards
        $this -> ShowPlayerCards();

        echo "Do you draw additional? Please answer with y/n" .PHP_EOL;
        $DecisionAdditionalDraw = trim(fgets(STDIN)); 
        while  ($DecisionAdditionalDraw <> 'y' && $DecisionAdditionalDraw <> 'n' ){
            echo "Please answer with y/n" .PHP_EOL;
            $DecisionAdditionalDraw = trim(fgets(STDIN)); 
        }

        while($DecisionAdditionalDraw == 'y'){
            if ($DecisionAdditionalDraw == 'y'){
                //Draw additional cards
                $this -> additionalDrawByPlayer();
                //Show player cards
                $this -> ShowPlayerCards();
            }else{
            }
            echo "Do you draw additional? Please answer with y/n" .PHP_EOL;
            $DecisionAdditionalDraw = trim(fgets(STDIN)); 
            while  ($DecisionAdditionalDraw <> 'y' && $DecisionAdditionalDraw <> 'n' ){
                echo "Please answer with y/n" .PHP_EOL;
                $DecisionAdditionalDraw = trim(fgets(STDIN)); 
            }
            
        }
        $this -> playerCardResult();
        echo "Your score is " . $this -> PlayerResult .PHP_EOL;
        echo "Dealer score is ".$this -> dealerResult .PHP_EOL;
        //Judge game result
        $this -> GameResult();


    }

    //Draw additional cards
    public function additionalDrawByPlayer()
    {
        $this -> player -> havingCards[] = $this -> drawCards -> drawOneCard()[0];
    }
    //Show player cards
    public function ShowPlayerCards()
    {
        echo "Your cards are below" .PHP_EOL;
        foreach ( $this -> player -> havingCards as $yourCard ) {
            echo "  ". $yourCard[0] . "-" . $yourCard[1] . "  ";
        }
        echo PHP_EOL;
    }
    
    //Make dealer card's result.
    public function DrawByDealer()
    {
        $temp = $this -> cardJudge ->getRank($this -> dealer -> havingCards[0][1]);
        $this -> dealerResult = $temp;
        $temp = $this -> cardJudge ->getRank($this -> dealer -> havingCards[1][1]);
        $this -> dealerResult  = $this -> dealerResult  + $temp;
        $num = 2;
        while ($this -> dealerResult < 18){
            $this -> dealer -> havingCards[] = $this -> drawCards -> drawOneCard()[0];
            $temp = $this -> cardJudge ->getRank($this -> dealer -> havingCards[$num][1]);
            $this -> dealerResult  = $this -> dealerResult  + $temp;
            $num += 1;
        }
    }

    //player Card results
    public function playerCardResult()
    {
        
        foreach ($this -> player -> havingCards as $yourCard) {
            $temp = $this -> cardJudge ->getRank($yourCard[1]);
            $this -> PlayerResult = $this -> PlayerResult  + $temp;
        }
        $includeAce = false;
        foreach ($this -> player -> havingCards as $yourCard) {
            if($yourCard[1] == 'A') {
                $includeAce = true;
            }
        }
        if ($includeAce = true && $this -> PlayerResult < 12){
            $this -> PlayerResult = $this -> PlayerResult  + 10;
        }
    }
    //Judge game result
    public function GameResult()
    {
        echo '---GAME RESULT---' .PHP_EOL;
        if ($this -> PlayerResult>21 && $this -> dealerResult > 21){
            echo 'draw'. PHP_EOL;
        }elseif($this -> dealerResult > 21){
            echo 'You win!'. PHP_EOL;
        }elseif($this -> PlayerResult>21){
            echo 'You Lose!'. PHP_EOL;
        }elseif($this -> PlayerResult==$this -> dealerResult){
            echo 'draw'. PHP_EOL;
        }elseif($this -> PlayerResult > $this -> dealerResult){
            echo 'You win!'. PHP_EOL;
        }else{
            echo 'You Lose!'. PHP_EOL;
        }
    }
}


