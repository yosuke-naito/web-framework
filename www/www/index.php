<?php
function getControllerAndIdAndMethod() {
    $directories = explode("/", $_SERVER["REQUEST_URI"]);
    $controller = null;
    $id = null;
    $method = null;

    for ($i = 0; $i < count($directories); $i++) {
        $directory = $directories[$i];

        if (isset($directory) && !empty($directory)) {
            switch ($i) {
            case 1:
                $controller = ucfirst($directory);
                break;
            case 2:
                if (is_numeric($directory)) {
                    $id = $directory;
                } else {
                    $method = ucfirst($directory);
                }

                break;
            case 3:
                if (isset($id) && !empty($id)) {
                    $method = ucfirst($directory);
                }

                break;
            default:
                break;
            }
        }
    }

    if (is_null($controller) || empty($controller) || is_null($method) || empty($method)) {
        $controller = "Index";
        $method = "index";
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $method = "before" . $method;
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $method = "after" . $method;
    }

    return [$controller, $method, $id];
}

function route($controller, $method, $id) {
    include("../controllers/" . $controller . ".php");
    (new $controller())->$method($id);
}

function main() {
    try {
        list($controller, $method, $id) = getControllerAndIdAndMethod();
        route($controller, $method, $id);
    } catch (Throwable $e) {
        include("../controller/ErrorOrException.php");
        exit;
    }
}

main();
?>
