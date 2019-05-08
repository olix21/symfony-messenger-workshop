<?php


namespace App\Controller;


use App\Entity\Bet;
use App\Message\GetBets;
use App\Message\RegisterBet;
use App\Message\RegisterGameResult;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

class BetController
{
    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @Route("/")
     * @Template()
     */
    public function home(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->bus->dispatch(
                new RegisterBet(
                    new Bet(
                        $request->request->get('username'),
                        $request->request->get('game'),
                        $request->request->getInt('leftScore'),
                        $request->request->getInt('rightScore')
                    )
                )
            );
        }

        $envelope = $this->bus->dispatch(new GetBets());
        $stamp = $envelope->last(HandledStamp::class);

        return [
            'bets' => $stamp->getResult(),
        ];
    }

    /**
     * @Route("report", methods={"POST"})
     * @Template()
     */
    public function report(Request $request)
    {
        $this->bus->dispatch(
            new RegisterGameResult(
                $request->request->get('game'),
                $request->request->get('leftScore'),
                $request->request->get('rightScore')
            )
        );

        return [];
    }
}