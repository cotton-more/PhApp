<?php

namespace AppModule\Http;

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

/**
 * @RoutePrefix("/")
 */
class DefaultController extends Controller
{
    /**
     * @Get("")
     */
    public function indexAction()
    {
        // Getting a response instance
        $response = new Response();

        // Set the content of the response
        $response->setContent('I am a simple response.');

        // Return the response
        return $response;
    }
}