<?php
class Router {
    private $controller = null;
    private $id = null;
    private $method = null;

    private function setController($directory) {
        $this->controller = ucfirst($directory) . "Controller";
    }

    private function setIdOrMethod($directory) {
        if (is_numeric($directory)) {
            $this->id = $directory;
        } else {
            $this->method = $directory;
        }
    }

    private function setMethod($directory) {
        if (isset($this->id) && !empty($this->id)) {
            $this->method = $directory;
        }
    }

    private function correctController() {
        if (is_null($this->controller) || empty($this->controller)) {
            $this->controller = "IndexController";
        }
    }

    private function correctMethod() {
        if (is_null($this->method) || empty($this->method)) {
            $this->method = "index";
        }

        if (isset($this->id) && !empty($this->id)) {
            $this->method = $this->method . "WithId";
        }

        $this->method = $this->method . $_SERVER["REQUEST_METHOD"];
    }

    private function setControllerAndIdAndMethod($directories) {
        for ($i = 0; $i < count($directories); $i++) {
            $directory = $directories[$i];

            if (isset($directory) && !empty($directory)) {
                switch ($i) {
                case 1:
                    $this->setController($directory);
                    break;
                case 2:
                    $this->setIdOrMethod($directory);
                    break;
                case 3:
                    $this->setMethod($directory);
                    break;
                default:
                    break;
                }
            }
        }

        $this->correctController();
        $this->correctMethod();
    }

    private function route() {
        if (isset($this->id) && !empty($this->id)) {
            (new $this->controller())->{$this->method}($this->id);
        } else {
            (new $this->controller())->{$this->method}();
        }
    }

    public function execute() {
        $this->setControllerAndIdAndMethod(explode("/", $_SERVER["REQUEST_URI"]));
        require_once("../controllers/" . $this->controller . ".php");
        $this->route();
    }
}
?>
