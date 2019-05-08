<?php


namespace App\MessageHandler;


use App\Message\BetResultMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class BetResultHandler implements MessageHandlerInterface
{
    public function __invoke(BetResultMessage $message)
    {
        echo 'victory';
    }
}