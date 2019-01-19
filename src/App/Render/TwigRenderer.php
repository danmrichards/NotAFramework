<?php
/**
 * @file
 * Contains \NotAFramework\App\Render\TwigRenderer.
 */

namespace NotAFramework\App\Render;

use Twig_LoaderInterface;
use Twig_Environment;

class TwigRenderer implements RendererInterface
{
    /**
     * The twig environment loader object.
     *
     * @var Twig_LoaderInterface
     */
    private $loader;

    /**
     * The twig environment object.
     *
     * @var Twig_Environment
     */
    private $twig;

    /**
     * Create a new TwigRenderer instance.
     *
     * @param Twig_LoaderInterface $loader
     */
    public function __construct(Twig_LoaderInterface $loader)
    {
        $this->loader = $loader;
        $this->twig = new Twig_Environment($loader);
    }

    /**
     * {@inheritdoc}
     */
    public function render($template, $data = [])
    {
        // Render the template with the extension. We'll always use the same
        // file extension so there's no need to keep repeating it.
        return $this->twig->render("{$template}.html.twig", $data);
    }
}
