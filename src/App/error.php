<?php
/**
 * @file
 * Implement error handling, just in case.
 */

// Register the error handler.
$whoops = new \Whoops\Run;

// Check our current environment setting and decide how to handle
// errors accordingly.
if ($config['environment'] !== 'production') {
    // Dev mode so show all error information.
    error_reporting(E_ALL);
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    // In production show a friendly message.
    $whoops->pushHandler(function () {
        echo "Blimey, that wasn't supposed to happen. Please email the developer";
    });
}

$whoops->register();
