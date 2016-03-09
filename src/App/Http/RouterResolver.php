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
            $handler[0] = $this->container->get($handler[0]);
        }

        return $handler;
    }
}
