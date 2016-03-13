# Not a Framework

[![Latest Version](https://img.shields.io/github/release/danmrichards/notaframework.svg)](https://github.com/danmrichards/NotAFramework/releases)
[![Software License](https://img.shields.io/packagist/l/danmrichards/notaframework.svg?style=flat)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/danmrichards/notaframework.svg?style=flat)](https://packagist.org/packages/danmrichards/notaframework)

This is not a framework, this is something to get things done in PHP.

This thing uses a few community packages to provide just enough functionality to do something useful.

For example [Whoops](https://github.com/filp/whoops) is used for error handling, [HttpFoundation](symfony/http-foundation) is used for HTTP and [PHRoute](https://github.com/mrjgreen/phroute) for routing. To name but a few.

## Installation

For the moment just clone the repo. Composer will come soon...or when I get around to it.

## Routing

Routes are defined in the `src/App/Http/routes.php` file. By default routing is powered by [PHRoute](https://github.com/mrjgreen/phroute). So see that for full documentation, but basically routes can either be defined as closures:

```
$router->get('/example', function() {
    return 'This route responds to requests with the GET method at the path /example';
});
```

Or they can be defined against classes and methods, such as the 2 example routes defined in the file:

```
$router->get('/', ['NotAFramework\App\Controllers\HelloWorldController', 'show']);
```

## Controllers

Controllers are placed in the `src/App/Controllers` directory and should be namespaced under `NotAFramework\App\Controllers;`.

There is no rigid pattern to follow with these controllers, you can add as many dependencies, helpers and additional traits/services/interfaces you like.

The example controller `src/App/Controllers/HelloWorldController.php` extends the base `NotAFramework\App\Controllers\Controller` abstract class. This allows the Symfony Request & Reponse objects to be passed to the controller. This is good practice and will allow easier interfacing with the HTTP layer.

## Dependency Injection

[Container](http://container.thephpleague.com/) from the PHP League handles dependency injection. All services are defined in the `src/App/container.php` file.

A few services have been set up by default; `Symfony\Component\HttpFoundation\Request` and `Symfony\Component\HttpFoundation\Response` are defined under the core services section. These are shared dependencies meaning that a single instance will be injected across the application.

Any additional services can be added at the bottom of this file. As an example the default front end renderer, Twig, has been defined. Notice that it has been defined as an alias of the `RendererInterface` interface, more on this below.

See the Container [documentation](http://container.thephpleague.com/) for more information.

## Theming

By default Twig is used as the theme layer, but this can easily be substituted. Simply create a new renderer class in the `src/App/Render` directory which implements the `NotAFramework\App\Render\RendererInterface` interface. You cna then update the `src/App/container.php` file and controllers accordingly.

Twig, if used in file system mode, will look it's template files in the `templates` folder.  

## Tests

Yeah...all the packages are unit tested within themselves, and we have PHPUnit. So that'll do for now.

## License

MIT License yo!
