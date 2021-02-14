<?php

use App\App;

require_once 'vendor/autoload.php';

define('APP_DIR', dirname(__DIR__));

$app = new App();
try
{
    $app->execute($argv, true);
}
catch(Exception $e)
{
    echo sprintf('Error message: %s ' . PHP_EOL . 'in %s:%s' . PHP_EOL . 'trace: %s' . PHP_EOL, $e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
}

echo $app->output();