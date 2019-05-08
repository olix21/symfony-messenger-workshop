<?php


namespace App\MessageHandler;


use App\Entity\Bet;
use App\Message\LostBet;
use App\Message\RegisterGameResult;
use App\Message\WonBet;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class RegisterGameResultMessageHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(EntityManagerInterface $entityManager, MessageBusInterface $eventBus)
    {
        $this->entityManager = $entityManager;
        $this->bus = $eventBus;
    }

    public function __invoke(RegisterGameResult $message)
    {
        $bets = $this->entityManager->getRepository(Bet::class)->findBy(['game' => $message->game]);

        foreach ($bets as $bet) {
            if ($bet->getLeftScore() === $message->leftScore && $bet->getRightScore() === $message->rightScore) {
                $this->bus->dispatch(new WonBet($bet));
            } else {
                $this->bus->dispatch(new LostBet($bet));
            }
        }
    }
}