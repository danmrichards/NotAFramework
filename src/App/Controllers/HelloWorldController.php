<?php
/**
 * @file
 * Contains \NotAFramework\App\Controllers\HelloWorldController.
 */

namespace NotAFramework\App\Controllers;

use NotAFramework\App\Controllers\Controller;
use NotAFramework\App\Render\RendererInterface;

class HelloWorldController extends Controller
{
    /**
     * The renderer object.
     *
     * @var RendererInterface
     */
    private $renderer;

    /**
     * Create a new HelloWorldController instance.
     *
     * @param RendererInterface $renderer
     *   Renderer object.
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Basic hello world route.
     */
    public function show()
    {
        // Build out the template data.
        $data = [
            'name' => $this->request->get('name', 'stranger'),
        ];

        // Render the template.
        $html = $this->renderer->render('hello', $data);

        $this->response->setContent($html);
    }

    /**
     * Basic route returning some JSON.
     */
    public function json()
    {
        // Define some data.
        $data = [
            'foo' => 'bar',
            'baz' => [
                'qux' => 'quux',
            ]
        ];

        // Set the JSON header.
        $this->response->headers->set('Content-Type', 'application/json');

        // Encode the data.
        $this->response->setContent(json_encode($data));
    }
}
