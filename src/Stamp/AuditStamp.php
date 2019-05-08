<?php


namespace App\Stamp;


use Symfony\Component\Messenger\Stamp\StampInterface;

class AuditStamp implements StampInterface
{
    /**
     * @var string
     */
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }
}