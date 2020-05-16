<?php
require_once("../controllers/Controller.php");

class IndexController extends Controller {
    public function indexGET() {
        if (!$this->checkLogin()) {
            $this->delegateToLoginController();

            return;
        }

        require_once("../views/IndexViewIndexGET.html");
    }
}
?>
