<?php
/**
 * @file
 * Contains \NotAFramework\App\Http\RouterResolver.
 */

namespace NotAFramework\App\Http;

use League\Container\Container;
use Phroute\Phroute\HandlerResolverInterface;

class RouterResolver implements HandlerResolverInterface
{
    /**
     * The dependency injection container.
     *
     * @var Container
     */
    private $container;

    /**
     * Create a new RouterResolver instance.
     *
     * @param Container $container
     *   Dependency injection container.
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($handler)
    {
        // Only attempt to resolve uninstantiated objects.
        if (is_array($handler) && is_string($handler[0])) {
            // Retrieve the route handler class from the dependency injection
            // container. This ensures that the instantiated handler class
            // receives all of the correct dependencies.
            $handler_object = $this->container->get($handler[0]);

            // Manually set the response and request dependencies.
            $handler_object->setRequest($this->container->get('Symfony\Component\HttpFoundation\Request'));
            $handler_object->setResponse($this->container->get('Symfony\Component\HttpFoundation\Response'));

            // Pass the object back.
            $handler[0] = $handler_object;
        }

        return $handler;
    }
}
