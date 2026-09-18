<?php

declare(strict_types=1);

require __DIR__ . '/../codigo/Domain/BedRepository.php';
require __DIR__ . '/../codigo/Persistence/InMemoryBedRepository.php';

use App\Persistence\InMemoryBedRepository;

$repository = new InMemoryBedRepository([
    ['room' => 'UCI', 'status' => 'OCUPADA'],
    ['room' => 'UCI', 'status' => 'DISPONIBLE'],
    ['room' => 'Emergencia', 'status' => 'OCUPADA'],
]);

$tests = [];

$tests['todos'] =
    count($repository->findAll()) === 3;

$tests['filtro por sala'] =
    count($repository->findAll('UCI')) === 2;

$tests['filtro por estado'] =
    count($repository->findAll(null, 'OCUPADA')) === 2;

$tests['sala y estado'] =
    count($repository->findAll('UCI', 'OCUPADA')) === 1;

$failed = 0;

foreach ($tests as $name => $passed) {
    echo ($passed ? '[PASS] ' : '[FAIL] ') . $name . PHP_EOL;

    if (!$passed) {
        $failed++;
    }
}

echo PHP_EOL;
echo 'Pruebas: ' . count($tests) . PHP_EOL;
echo 'Correctas: ' . (count($tests) - $failed) . PHP_EOL;
echo 'Fallidas: ' . $failed . PHP_EOL;

exit($failed === 0 ? 0 : 1);
