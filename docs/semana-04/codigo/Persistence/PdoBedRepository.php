<?php

declare(strict_types=1);

namespace App\Persistence;

use App\Domain\BedRepository;
use PDO;

final class PdoBedRepository implements BedRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findAll(
        ?string $room = null,
        ?string $status = null
    ): array {
        $sql = '
            SELECT
                rooms.name AS room,
                beds.status AS status
            FROM beds
            INNER JOIN rooms
                ON rooms.id = beds.room_id
            WHERE 1 = 1
        ';

        $params = [];

        if ($room !== null) {
            $sql .= ' AND rooms.name = :room';
            $params['room'] = $room;
        }

        if ($status !== null) {
            $sql .= ' AND beds.status = :status';
            $params['status'] = $status;
        }

        $sql .= ' ORDER BY rooms.name, beds.id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll();
    }
}
