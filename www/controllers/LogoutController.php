<?php
require_once("../controllers/Controller.php");

class LogoutController extends Controller {
    public function indexGET() {
        $_SESSION = array();
        session_destroy();
        $this->delegateToLoginController();
    }
}
?>
