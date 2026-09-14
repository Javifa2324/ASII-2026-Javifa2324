<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Application\OccupancyService;
use InvalidArgumentException;
use Throwable;

final class OccupancyController
{
    public function __construct(
        private OccupancyService $service
    ) {
    }

    public function handle(array $query): array
    {
        try {
            $data = $this->service->execute(
                $query['room'] ?? null,
                $query['status'] ?? null
            );

            return [
                'status' => 200,
                'data' => $data,
                'error' => null,
            ];
        } catch (InvalidArgumentException $exception) {
            return [
                'status' => 422,
                'data' => null,
                'error' => $exception->getMessage(),
            ];
        } catch (Throwable $exception) {
            return [
                'status' => 500,
                'data' => null,
                'error' => 'No fue posible consultar la ocupación.',
            ];
        }
    }
}
