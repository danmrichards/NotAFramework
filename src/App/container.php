<?php
/**
 * @file
 * The app container, handles dependency injection.
 */

use League\Container\Container;
use League\Container\ReflectionContainer;

// Get the app container.
$container = new Container;

// Utilise container 'auto wiring' to automatically inject
// dependencies into our controllers.
$container->delegate(
    new ReflectionContainer
);

/**
 * ----------------------------------------------------------------------------
 * Core Services
 * ----------------------------------------------------------------------------
 * These services are required by core. DO NOT remove these entries unless
 * you are very sure what you're doing.
 *
 * Really.
 */

$container->share('Symfony\Component\HttpFoundation\Request', function () {
    return Symfony\Component\HttpFoundation\Request::createFromGlobals();
});

$container->share('Symfony\Component\HttpFoundation\Response');

/**
 * ----------------------------------------------------------------------------
 * Additional Services
 * ----------------------------------------------------------------------------
 * Define extra services for the application to use here. The services can be
 * mapped to fully qualified class names or aliases and they can also be shared.
 *
 * Examples:
 *
 * // Fully qualified class name
 * $container->add('Acme\Service\SomeService');
 *
 * // Aliased class.
 * $container->add('service', 'Acme\Service\SomeService');
 *
 * @see http://container.thephpleague.com/
 */

// By default we'll use Twig as our renderer. Feel free to swap this out.
$container->add('NotAFramework\App\Render\RendererInterface', 'NotAFramework\App\Render\TwigRenderer')
    ->withArgument(new Twig_Loader_Filesystem(__DIR__ . '/../../templates'));
