<?php
define('ROOT', __DIR__);
require ROOT . '/app/config/config.php';
require ROOT . '/app/core/Cache.php';
require ROOT . '/app/core/ApiClient.php';
$r = ApiClient::get('schedule', [], 0);
echo "ok: " . var_export($r['ok'] ?? null, true) . "\n";
$d = $r['data'] ?? $r;
echo "kunci teratas: " . implode(', ', array_slice(array_keys(is_array($d) ? $d : []), 0, 20)) . "\n\n";
echo substr(json_encode($d, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), 0, 2600) . "\n";
