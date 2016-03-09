<?php
/**
 * @file
 * Implement the router so we can show some content.
 */

use Phroute\Phroute\RouteCollector;

// Create the router.
$router = new RouteCollector();

/**
 * ----------------------------------------------------------------------------
 * Application Routes
 * ----------------------------------------------------------------------------
 * Define routes for the application to use here. These routes can be mapped to
 * controllers or use simple named routes with anonymous callback functions.
 *
 * Examples:
 *
 * // Basic anonymous function route.
 * $router->get('/basic', function () {
 *     return 'This is a basic route';
 * });
 *
 * // Controller based route.
 * $router->get('/', ['NotAFramework\App\Controllers\Example', 'show']);
 *
 * @see https://github.com/mrjgreen/phroute
 */

$router->get('/', ['NotAFramework\App\Controllers\HelloWorldController', 'show']);

$router->get('/json', ['NotAFramework\App\Controllers\HelloWorldController', 'json']);
