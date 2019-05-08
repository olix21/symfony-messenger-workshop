<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetRepository")
 */
class Bet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $game;

    /**
     * @ORM\Column(type="integer")
     */
    private $leftScore;

    /**
     * @ORM\Column(type="integer")
     */
    private $rightScore;

    public function __construct(string $username, string $game, int $leftScore, int $rightScore)
    {
        $this->game = $game;
        $this->leftScore = $leftScore;
        $this->rightScore = $rightScore;
        $this->username = $username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getGame(): ?string
    {
        return $this->game;
    }

    public function setGame(string $game): self
    {
        $this->game = $game;

        return $this;
    }

    public function getLeftScore(): ?int
    {
        return $this->leftScore;
    }

    public function setLeftScore(int $leftScore): self
    {
        $this->leftScore = $leftScore;

        return $this;
    }

    public function getRightScore(): ?int
    {
        return $this->rightScore;
    }

    public function setRightScore(int $rightScore): self
    {
        $this->rightScore = $rightScore;

        return $this;
    }
}
