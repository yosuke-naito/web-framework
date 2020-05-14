<?php
require_once("../controllers/Controller.php");
require_once("../models/LoginModel.php");

class LoginController extends Controller {
    public function indexGET() {
        $smarty = $this->getSmarty();
        $smarty->display("LoginViewIndexGET.html");
    }

    public function indexPOST() {
        $smarty = $this->getSmarty();
        $loginModel = new LoginModel();

        if ($loginModel->checkLogin()) {
            session_regenerate_id();
            $_SESSION["userId"] = $loginModel->getUserId();
            $smarty->display("LoginViewIndexPOST.html");
        } else {
            $smarty->display("LoginViewIndexGET.html");
        }
    }
}
?>
