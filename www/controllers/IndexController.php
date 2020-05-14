<?php
require_once("../controllers/Controller.php");

class IndexController extends Controller {
    public function indexBefore() {
        if (!$this->checkLogin()) {
            $this->delegateToLogin();

            return;
        }

        $smarty = $this->getSmarty();
        $smarty->display("IndexViewIndexBefore.html");
    }

    public function indexAfter() {
    }
}
?>
