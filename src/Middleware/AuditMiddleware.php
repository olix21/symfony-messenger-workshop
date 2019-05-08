<?php


namespace App\Middleware;


use App\Stamp\AuditStamp;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Messenger\Stamp\ReceivedStamp;


class AuditMiddleware implements MiddlewareInterface
{

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        if ($envelope->last(AuditStamp::class)) {
            $envelope->with(new AuditStamp(uniqid()));
        }

        $nextEnvelope = $stack->next()->handle($envelope, $stack);

        if ($nextEnvelope->last(ReceivedStamp::class)) {
            var_dump('Received message');
        }


        return $envelope;
    }
}