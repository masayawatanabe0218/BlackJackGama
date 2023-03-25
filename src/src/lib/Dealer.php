<?php

class Dealer
{
    private int $result;

    public function __construct(public array $havingCards)
    {
    }

    
    public function resultRecord(int $result)
    {
        $this -> result = $result; 
    }
}
