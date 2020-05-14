<?php
class Router {
    private $controller = null;
    private $id = null;
    private $method = null;

    public function createControllerAndIdAndMethod() {
        $controller = null;
        $id = null;
        $method = null;
        $directories = explode("/", $_SERVER["REQUEST_URI"]);

        for ($i = 0; $i < count($directories); $i++) {
            $directory = $directories[$i];

            if (isset($directory) && !empty($directory)) {
                switch ($i) {
                case 1:
                    $controller = ucfirst($directory) . "Controller";
                    break;
                case 2:
                    if (is_numeric($directory)) {
                        $id = $directory;
                    } else {
                        $id = null;
                        $method = ucfirst($directory);
                    }

                    break;
                case 3:
                    if (isset($this->id) && !empty($this->id)) {
                        $method = ucfirst($directory);
                    }

                    break;
                default:
                    break;
                }
            }
        }

        if (is_null($this->controller) || empty($this->controller)) {
            $controller = "IndexController";
        }

        if (is_null($this->method) || empty($this->method)) {
            $method = "index";
        }

        return [$controller, $id, $method];
    }

    public function getControllerAndIdAndMethod() {
        return [$this->controller, $this->id, $this->method];
    }

    public function setControllerAndIdAndMethod($controller, $id, $method) {
        $this->controller = $controller;
        $this->id = $id;
        $this->method = $method;
    }

    public function route($modifier) {
        require_once("../controllers/" . $this->controller . ".php");
        (new $this->controller())->{$this->method . $modifier}();
    }

    public function execute() {
        if (!is_null($this->controller) && !is_null($this->method)) {
            $this->route("After");
        }

        list($controller, $id, $method) = $this->createControllerAndIdAndMethod();
        $this->setControllerAndIdAndMethod($controller, $id, $method);
        $this->route("Before");
    }
}
?>
