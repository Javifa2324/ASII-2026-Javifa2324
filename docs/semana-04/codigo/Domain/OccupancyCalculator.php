<?php

declare(strict_types=1);

namespace App\Domain;

use InvalidArgumentException;

final class OccupancyCalculator
{
    public function summarize(array $beds): array
    {
        $rooms = [];

        $total = 0;
        $occupied = 0;
        $available = 0;
        $maintenance = 0;

        foreach ($beds as $bed) {
            if (!isset($bed['room'], $bed['status'])) {
                throw new InvalidArgumentException(
                    'Cada cama debe incluir sala y estado.'
                );
            }

            $room = trim((string) $bed['room']);
            $status = (string) $bed['status'];

            if ($room === '') {
                throw new InvalidArgumentException(
                    'La sala no puede estar vacía.'
                );
            }

            BedStatus::assertValid($status);

            if (!isset($rooms[$room])) {
                $rooms[$room] = [
                    'room' => $room,
                    'total' => 0,
                    'occupied' => 0,
                    'available' => 0,
                    'maintenance' => 0,
                    'occupancy_percentage' => 0.0,
                ];
            }

            $rooms[$room]['total']++;
            $total++;

            switch ($status) {
                case BedStatus::OCCUPIED:
                    $rooms[$room]['occupied']++;
                    $occupied++;
                    break;

                case BedStatus::AVAILABLE:
                    $rooms[$room]['available']++;
                    $available++;
                    break;

                case BedStatus::MAINTENANCE:
                    $rooms[$room]['maintenance']++;
                    $maintenance++;
                    break;
            }
        }

        foreach ($rooms as &$room) {
            $room['occupancy_percentage'] =
                $room['total'] > 0
                    ? round(($room['occupied'] / $room['total']) * 100, 2)
                    : 0.0;
        }

        unset($room);

        ksort($rooms);

        return [
            'total' => $total,
            'occupied' => $occupied,
            'available' => $available,
            'maintenance' => $maintenance,
            'occupancy_percentage' =>
                $total > 0
                    ? round(($occupied / $total) * 100, 2)
                    : 0.0,
            'rooms' => array_values($rooms),
        ];
    }
}
