<?php
session_start();

class Router {
    private $controller = null;
    private $id = null;
    private $method = null;

    private function correctController() {
        if (is_null($this->controller) || empty($this->controller)) {
            $this->controller = "IndexController";
        }
    }

    private function correctMethod() {
        if (is_null($this->method) || empty($this->method)) {
            $this->method = "Index";
        }
    }

    private function modifyMethod() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->method = "before" . $this->method;
        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->method = "after" . $this->method;
        }
    }

    public function setControllerAndIdAndMethod($directories) {
        for ($i = 0; $i < count($directories); $i++) {
            $directory = $directories[$i];

            if (isset($directory) && !empty($directory)) {
                switch ($i) {
                case 1:
                    $this->controller = ucfirst($directory) . "Controller";
                    break;
                case 2:
                    if (is_numeric($directory)) {
                        $this->id = $directory;
                    } else {
                        $this->method = ucfirst($directory);
                    }

                    break;
                case 3:
                    if (isset($this->id) && !empty($this->id)) {
                        $this->method = ucfirst($directory);
                    }

                    break;
                default:
                    break;
                }
            }
        }

        $this->correctController();
        $this->correctMethod();
        $this->modifyMethod();
    }

    public function route() {
        include("../controllers/" . $this->controller . ".php");
        (new $this->controller())->{$this->method}($this->id);
    }
}

function main() {
    try {
        $router = new Router();
        $router->setControllerAndIdAndMethod(explode("/", $_SERVER["REQUEST_URI"]));
        $router->route();
    } catch (Throwable $e) {
        error_log($e);
        include("../controllers/ErrorOrExceptionController.php");
        (new ErrorOrExceptionController())->beforeIndex();
        exit;
    }
}

main();
?>
