<?php

namespace Test;

use PhpXrp\Api\ServerInfoApi;

require __DIR__ . '/vendor/autoload.php';

$api = new ServerInfoApi();

$response = $api->getInfo();

echo print_r($response, true);