<?php

declare(strict_types=1);

namespace App\Workflow\ReserveTicket;

use App\Entity\Auditorium\ReservedSeat;
use App\Entity\Reservation;
use App\Repository\Auditorium\SeatRepositoryInterface;
use App\Repository\Reservation\TypeRepositoryInterface;
use App\Repository\ReservationRepositoryInterface;
use App\Repository\ScreeningRepositoryInterface;
use Cycle\Database\Injection\Parameter;
use Cycle\ORM\EntityManagerInterface;

class ReserveTicketActivity implements ReserveTicketActivityInterface
{
    public function __construct(
        private readonly ScreeningRepositoryInterface $screenings,
        private readonly TypeRepositoryInterface $reservationType,
        private readonly ReservationRepositoryInterface $reservations,
        private readonly SeatRepositoryInterface $seats,
        private readonly EntityManagerInterface $entityManager,
        private readonly SeatsReservationChecker $reservationChecker
    ) {
    }

    public function reserve(
        string $reservationId,
        int $screeningId,
        int $reservationTypeId,
        array $seatIds
    ): int {
        //$this->reservationChecker->checkAvailability($screeningId, $seatIds);

        $screening = $this->screenings->getByPK($screeningId);
        $reservationType = $this->reservationType->getByPK($reservationTypeId);

        $seats = $this->seats->findAll([
            'id' => ['in' => new Parameter($seatIds)],
        ]);

        $reservation = new Reservation(
            $reservationId,
            $screening,
            $reservationType
        );

        $this->entityManager->persist($reservation);
        $this->entityManager->run();

        foreach ($seats as $seat) {
            $reservedSeat = new ReservedSeat($seat, $reservation);
            $this->entityManager->persist($reservedSeat);
        }

        $this->entityManager->run();
        $this->entityManager->clean();

        return 600;
    }

    public function cancel(string $reservationId)
    {
        $reservation = $this->reservations->getByPK($reservationId);

        if ($reservation->isPaid()) {
            throw new \Exception(\sprintf('reservation %s was paid', $reservationId));
        }

        $reservation->markAsCanceled();

        $this->entityManager->persist($reservation);

        foreach ($reservation->getSeats() as $seat) {
            $this->entityManager->delete($seat);
        }

        $this->entityManager->run();

        return \sprintf(
            'Reservation [%s] canceled at: %s',
            $reservationId,
            $reservation->getCanceledAt()->format(DATE_W3C)
        );
    }
}