<?php


namespace App\MessageHandler;


use App\Entity\Bet;
use App\Message\GetBets;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetBetsMessageHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(GetBets $getBets)
    {
        return $this->entityManager->getRepository(Bet::class)->findAll();
    }
}