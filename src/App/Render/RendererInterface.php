<?php
/**
 * @file
 * Contains \NotAFramework\App\Render\RendererInterface.
 */

namespace NotAFramework\App\Render;

/**
 * Interface that our chosen template engine will need to implement.
 */
interface RendererInterface
{
    /**
     * Render the template.
     *
     * @param string $template
     *   Name of the template to render.
     * @param array $data
     *   Variables to pass through to the template.
     */
    public function render($template, $data = []);
}
