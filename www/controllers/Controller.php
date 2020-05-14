<?php
require_once("../smarty/libs/Smarty.class.php");

class Controller {
    protected function checkLogin() {
        return isset($_SESSION["userId"]);
    }

    protected function delegateToLoginController() {
        require_once("../controllers/LoginController.php");
        (new LoginController())->indexGET(null);
    }

    protected function getSmarty() {
        $smarty = new Smarty();
        $smarty->template_dir = "../views";
        $smarty->compile_dir = "../views_c";

        return $smarty;
    }
}
?>
