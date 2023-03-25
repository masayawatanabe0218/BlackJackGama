<?php
// $testclass = new CardJudge();
// var_dump($testclass -> getRank('3'));
// echo 777777777777 . PHP_EOL;
// var_dump('3');
class CardJudge
{
    public const CARD_RANK = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 10,
        'Q' => 10,
        'K' => 10,
        'A' => 1,
    ];

    public function __construct()
    {
    }

    public function getRank(string $Card): int
    {
        return self::CARD_RANK[$Card];
    }
}