<?php
/**
 * @file
 * Application bootstrap - Lets get this party started.
 */

namespace NotAFramework;

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Symfony\Component\HttpFoundation\Response;
use NotAFramework\App\Http\RouterResolver;

// Use the autoloader from composer; because why not.
require __DIR__ . '/../vendor/autoload.php';

// Load the app configuration.
require_once __DIR__ . '/App/config.php';

// Load the error handler.
require __DIR__ . '/App/error.php';

// Load the app container.
require __DIR__ . '/App/container.php';

// Load the routes.
require __DIR__ . '/App/Http/routes.php';

// Get the request object.
$request = $container->get('Symfony\Component\HttpFoundation\Request');

// Get the response object.
$response = $container->get('Symfony\Component\HttpFoundation\Response');

// Load our custom router resolver which allows integration with the
// dependency injection container.
$resolver = new RouterResolver($container);

// Create the route dispatcher.
$dispatcher = new Dispatcher($router->getData(), $resolver);

// Dispatch the current route and handle the response.
try {
    // All good - Show the response.
    $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
} catch (HttpRouteNotFoundException $e) {
    // Handle 404 errors.
    $response->setContent('404 - Page not found');
    $response->setStatusCode(Response::HTTP_NOT_FOUND);
} catch (HttpMethodNotAllowedException $e) {
    // Handle 405 errors.
    $response->setContent('405 - Method not allowed');
    $response->setStatusCode(Response::HTTP_METHOD_NOT_ALLOWED);
}

// Prepare the response.
$response->prepare($request);

// Send the response.
$response->send();
