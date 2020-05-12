<?php
require_once("../smarty/libs/Smarty.class.php");

class Controller {
    protected function checkLogin() {
        return isset($_SESSION["user_id"]);
    }

    protected function delegateToLogin() {
        include("../controllers/LoginController.php");
        (new LoginController())->beforeIndex();
    }

    protected function getSmarty() {
        $smarty = new Smarty();
        $smarty->template_dir = "../views";
        $smarty->compile_dir = "../views_c";

        return $smarty;
    }
}
?>
