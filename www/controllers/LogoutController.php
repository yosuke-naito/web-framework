<?php
require_once("../controllers/Controller.php");

class LogoutController extends Controller {
    public function indexBefore() {
        require_once("../routers/Router.php");
        $_SESSION = array();
        session_destroy();
        $_SESSION["router"] = new Router();
        $_SESSION["router"]->setControllerAndIdAndMethod("IndexController", null, "index");
        $this->delegate("IndexController", "indexBefore");
    }

    public function indexAfter() {
    }
}
?>
