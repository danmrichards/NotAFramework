<?php
/**
 * @file
 * Contains \NotAFramework\App\Controllers\Controller.
 */

namespace NotAFramework\App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    /**
     * The HTTP request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The HTTP response object.
     *
     * @var Response
     */
    protected $response;

    /**
     * Set the request object.
     *
     * @param Request $request
     *   HTTP request object.
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Set the response object.
     *
     * @param Response $response
     *   HTTP response object.
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }
}
