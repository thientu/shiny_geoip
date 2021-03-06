<?php
require_once __DIR__ . '/../src/bootstrap.php';

$reader = new \MaxMind\Db\Reader(__DIR__ . '/../data/GeoLite2-City.mmdb');
$count = 40000;
$startTime = microtime(true);
for ($i = 0; $i < $count; $i++) {
    $ip = long2ip(rand(0, pow(2, 32) -1));
    try {
        $t = $reader->get($ip);
    } catch (Exception $e) {
    }
    if ($i % 1000 == 0) {
        print($i . ' ' . $ip . "\n");
    }
}
$endTime = microtime(true);
$duration = $endTime - $startTime;
print('Requests per second: ' . $count / $duration . "\n");
