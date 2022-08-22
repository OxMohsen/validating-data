<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/Config.php';

use OxMohsen\TgBot\Config;
use OxMohsen\TgBot\Validate;

$initData     = $_POST['initData'] ?? '';
$result['ok'] = false;

if (Validate::isSafe(Config::BOT_TOKEN, $initData)) {
    $result['ok'] = true;
}

header('Content-type: application/json');
echo json_encode($result);
