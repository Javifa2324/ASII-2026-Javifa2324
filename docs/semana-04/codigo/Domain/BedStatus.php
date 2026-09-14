<?php

declare(strict_types=1);

namespace App\Domain;

use InvalidArgumentException;

final class BedStatus
{
    public const OCCUPIED = 'OCCUPIED';
    public const AVAILABLE = 'AVAILABLE';
    public const MAINTENANCE = 'MAINTENANCE';

    public static function all(): array
    {
        return [
            self::OCCUPIED,
            self::AVAILABLE,
            self::MAINTENANCE,
        ];
    }

    public static function assertValid(string $status): void
    {
        if (!in_array($status, self::all(), true)) {
            throw new InvalidArgumentException(
                "Estado de cama no válido: {$status}"
            );
        }
    }
}
