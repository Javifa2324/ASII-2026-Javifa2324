<?php

declare(strict_types=1);

namespace App\Persistence;

use App\Domain\BedRepository;

final class InMemoryBedRepository implements BedRepository
{
    public function __construct(
        private array $beds = []
    ) {
    }

    public function findAll(
        ?string $room = null,
        ?string $status = null
    ): array {
        $result = array_filter(
            $this->beds,
            static function (array $bed) use ($room, $status): bool {
                if ($room !== null && ($bed['room'] ?? null) !== $room) {
                    return false;
                }

                if ($status !== null && ($bed['status'] ?? null) !== $status) {
                    return false;
                }

                return true;
            }
        );

        return array_values($result);
    }
}
