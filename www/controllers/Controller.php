<?php
class Controller {
    protected function checkLogin() {
        return isset($_SESSION["user_id"]);
    }

    protected function delegateToLogin() {
        include("../controllers/LoginController.php");
        (new LoginController())->beforeIndex();
    }
}
?>
