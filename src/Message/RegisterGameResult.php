<?php


namespace App\Message;


class RegisterGameResult
{
    /**
     * @var string
     */
    public $game;
    /**
     * @var int
     */
    public $leftScore;
    /**
     * @var int
     */
    public $rightScore;

    public function __construct(string $game, int $leftScore, int $rightScore)
    {
        $this->game = $game;
        $this->leftScore = $leftScore;
        $this->rightScore = $rightScore;
    }
}