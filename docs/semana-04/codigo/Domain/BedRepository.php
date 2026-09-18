<?php

declare(strict_types=1);

namespace App\Domain;

interface BedRepository
{
    public function findAll(
        ?string $room = null,
        ?string $status = null
    ): array;
}
