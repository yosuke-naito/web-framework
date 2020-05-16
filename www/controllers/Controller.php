<?php
class Controller {
    protected function checkLogin() {
        return isset($_SESSION["userId"]);
    }

    protected function delegateToLoginController() {
        require_once("../controllers/LoginController.php");
        (new LoginController())->indexGET(null);
    }
}
?>
