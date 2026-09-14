<?php

declare(strict_types=1);

namespace App\Persistence;

use PDO;

final class PdoConnectionFactory
{
    public static function create(array $config): PDO
    {
        $pdo = new PDO(
            $config['dsn'],
            $config['user'] ?? null,
            $config['password'] ?? null,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

        $pdo->exec('PRAGMA foreign_keys = ON');

        return $pdo;
    }
}
