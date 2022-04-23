<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OxMohsen\TgBot\Validate;

$initData     = $_POST['initData'] ?? '';
$result['ok'] = false;

if (Validate::isSafe($initData)) {
    $result['ok'] = true;
}

header('Content-type: application/json');
echo json_encode($result);
