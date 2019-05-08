<?php


namespace App\Message;


use App\Entity\Bet;

abstract class BetResultMessage
{
    /**
     * @var Bet
     */
    public $bet;

    public function __construct(Bet $bet)
    {
        $this->bet = $bet;
    }
}