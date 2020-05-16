<?php
require_once("../controllers/Controller.php");
require_once("../models/LoginModel.php");

class LoginController extends Controller {
    public function indexGET() {
        require_once("../views/LoginViewIndexGET.html");
    }

    public function indexPOST() {
        $loginModel = new LoginModel();

        if ($loginModel->checkLogin()) {
            session_regenerate_id();
            $_SESSION["id"] = $loginModel->getId();
            require_once("../views/LoginViewIndexPOST.html");
        } else {
            require_once("../views/LoginViewIndexGET.html");
        }
    }
}
?>
