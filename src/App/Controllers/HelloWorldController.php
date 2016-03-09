<?php
/**
 * @file
 * Contains \NotAFramework\App\Controllers\HelloWorldController.
 */

namespace NotAFramework\App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use NotAFramework\App\Render\RendererInterface;

class HelloWorldController
{
    /**
     * The HTTP request object.
     *
     * @var Request
     */
    private $request;

    /**
     * The HTTP response object.
     *
     * @var Response
     */
    private $response;

    /**
     * The renderer object.
     *
     * @var RendererInterface
     */
    private $renderer;

    /**
     * Create a new HelloWorldController instance.
     *
     * @param Request $request
     *   HTTP request object.
     * @param Response $response
     *   HTTP response object.
     * @param RendererInterface $renderer
     *   Renderer object.
     */
    public function __construct(Request $request, Response $response, RendererInterface $renderer)
    {
        $this->request = $request;
        $this->response = $response;
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
