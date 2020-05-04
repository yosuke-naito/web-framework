<?php
function getControllerAndIdAndMethod() {
    $controller = null;
    $id = null;
    $method = null;
    $directories = explode("/", $_SERVER["PATH_INFO"]);

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
                        $method = $directory;
                    }

                    break;
                case 3:
                    if (isset($id) && !empty($id)) {
                        $method = $directory;
                    }

                    break;
                default:
                    break;
            }
        }
    }

    if (is_null($method) || empty($method)) {
        $method = "index";
    }

    return [$controller, $id, $method];
}

if (empty($_SERVER["PATH_INFO"])) {
    include("../views/index.php");
    exit;
}

list($controller, $id, $method) = getControllerAndIdAndMethod();

if (file_exists("../controllers/".$controller.".php")) {
    include("../controllers/" . $controller . ".php");

    try {
        if (method_exists(new $controller(), $method)) {
            (new $controller())->$method($id);
	}
    } catch (Exception $e) {
        include("../views/index.php");
        exit;
    }
}
?>
