<?php
require_once("../controllers/Controller.php");

class IndexController extends Controller {
    public function indexGET() {
        if (!$this->checkLogin()) {
            error_log("？");
            $this->delegateToLoginController();

            return;
        }

        $smarty = $this->getSmarty();
        $smarty->display("LoginViewIndexPOST.html");
    }
}
?>
