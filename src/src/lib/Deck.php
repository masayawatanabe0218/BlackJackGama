<?php


class Deck
{
    public $cards = [];
    private const SUITS = ['Heart', 'Spade', 'Diamond', 'Clover'];
    private const CARD_NUMBERS = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];



    public function __construct()
    {
        foreach (self::SUITS as $suit) {
            foreach (self::CARD_NUMBERS as $number) {
                $card = [$suit, $number];
                $this -> cards[] = $card;
            }
        }
        if (shuffle($this -> cards))
        {
            shuffle($this -> cards);
        }else{
        }
    }
}