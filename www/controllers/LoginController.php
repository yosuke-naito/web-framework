<?php
require_once("../controllers/Controller.php");
require_once("../models/LoginModel.php");

class LoginController extends Controller {
    public function indexBefore() {
        $smarty = $this->getSmarty();
        $controller = lcfirst(substr($_SESSION["controllerBeforeLogin"], 0, -10));
        $id = $_SESSION["idBeforeLogin"];
        $method = $_SESSION["methodBeforeLogin"];
        $action = null;

        if (is_null($id)) {
            $action = "/" . $controller . "/" . $method . "/";
        } else {
            $action = "/" . $controller . "/" . $id . "/" . $method . "/";
        }

        $smarty->assign("action", $action);
        $smarty->display("LoginViewIndexBefore.html");
    }

    public function indexAfter() {
        $loginModel = new LoginModel();

        if ($loginModel->checkLogin()) {
            session_regenerate_id();
            $_SESSION["userId"] = $loginModel->getUserId();
        }
    }
}
?>
