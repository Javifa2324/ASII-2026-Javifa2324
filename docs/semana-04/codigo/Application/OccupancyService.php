<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\BedRepository;
use App\Domain\BedStatus;
use App\Domain\OccupancyCalculator;

final class OccupancyService
{
    public function __construct(
        private BedRepository $repository,
        private OccupancyCalculator $calculator
    ) {
    }

    public function execute(
        ?string $room = null,
        ?string $status = null
    ): array {
        $room = $room !== null && trim($room) !== ''
            ? trim($room)
            : null;

        $status = $status !== null && trim($status) !== ''
            ? strtoupper(trim($status))
            : null;

        if ($status !== null) {
            BedStatus::assertValid($status);
        }

        $beds = $this->repository->findAll($room, $status);

        return $this->calculator->summarize($beds);
    }
}
