<?php


namespace App\MessageHandler;


use App\Entity\Bet;
use App\Message\RegisterBet;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class RegisterBetMessageHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(RegisterBet $message)
    {
        $this->entityManager->persist($message->bet);
        $this->entityManager->flush();

    }
}