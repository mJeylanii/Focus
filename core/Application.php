<?php

namespace app\core;

use app\controllers\Controller;

class Application
{
    /*
     * These are typed properties
     * They will be accessible throughout the application
     * */
    public static string $ROOT_DIR;
    public Request $request;
    public Router $router;
    public Response $response;
    public static Application $app;
    public Controller $controller;

    /*
     * 1:
     * In the Application we first create a constructor to create an instance of the router*/
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        /*After declaring the request and response instances we can pass them into the router, so we can use
        them in the router*/
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database();
    }

    public function run()
    {
        /*
         * The run method in the end echos the requested data here (HTML) in this case and is rendered to the user*/
        echo $this->router->resolve();
        /*The resolve method is the Router class and is accessible by the Application because of the router instance
         created at the top*/
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}