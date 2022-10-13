<?php

declare(strict_types=1);

namespace App\Event;

use App\Broadcast\ShouldBroadcastInterface;
use App\Entity\Reservation;

final class TicketBought implements ShouldBroadcastInterface
{
    public function __construct(
        public readonly Reservation $reservation
    ) {
    }

    public function getBroadcastTopics(): iterable|string|\Stringable
    {
        return \sprintf('user.%s', $this->reservation->getUser()->getId());
    }

    public function getPayload(): array
    {
        return [
            'id' => $this->reservation->getUuid(),
        ];
    }
}