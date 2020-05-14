<?php
require_once("../smarty/libs/Smarty.class.php");

class Controller {
    protected function checkLogin() {
        return isset($_SESSION["userId"]);
    }

    protected function delegate($controller, $method) {
        require_once("../controllers/" . $controller . ".php");
        (new $controller())->{$method}();
    }

    protected function delegateToLogin() {
        list($_SESSION["controllerBeforeLogin"], $_SESSION["idBeforeLogin"], $_SESSION["methodBeforeLogin"]) = $_SESSION["router"]->getControllerAndIdAndMethod();
        $_SESSION["router"]->setControllerAndIdAndMethod("LoginController", null, "index");
        $this->delegate("LoginController", "indexBefore");
    }

    protected function getSmarty() {
        $smarty = new Smarty();
        $smarty->template_dir = "../views";
        $smarty->compile_dir = "../views_c";

        return $smarty;
    }
}
?>
