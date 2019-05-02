<?php

namespace App\Core;

class Application
{
    const DEFAULT_CONTROLLER = "\App\Controllers\HomeController";
    const DEFAULT_ACTION = 'index';

    protected $controller;
    protected $action;
    protected $params;

    public function __construct()
    {
        $this->setup();
        $this->parseUri();
    }

    /**
     * Common setup
     *
     * @return void
     */
    public function setup()
    {
        //
    }

    /**
     * Parser uri request and determine controller, action, param
     *
     * @return void
     */
    protected function parseUri()
    {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $pathInfo = explode("/", $path, 3);
        $this->params = [];
        $this->action = self::DEFAULT_ACTION;
        $this->controller = self::DEFAULT_CONTROLLER;

        if (count($pathInfo) >= 1 && $pathInfo[0] !== '') {
            if (isset($pathInfo[0])) {
                $this->setController($pathInfo[0]);
            }

            if (isset($pathInfo[1])) {
                $this->setAction($pathInfo[1]);
            }

            if (isset($pathInfo[2])) {
                $this->params = [$pathInfo[2]];
            }
        }
    }

    private function setController($controllerName)
    {
        $controller = sprintf("\App\Controllers\%sController", ucfirst($controllerName));

        if (!class_exists($controller)) {
            throw new \Exception("Controller {$controller} not found!");
        }

        $this->controller = $controller;

        return $this;
    }

    private function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Call specific controller and action via params in request
     * 
     * @return void
     */
    public function run()
    {
        call_user_func_array(array(new $this->controller, $this->action), $this->params);
    }
}