<?php
require_once("../controllers/Controller.php");

class UsersController extends Controller {
    public function indexGET() {
        if (!$this->checkLogin()) {
            $this->delegateToLoginController();

            return;
        }

        $smarty = $this->getSmarty();
        $smarty->display("UsersViewIndexGET.html");
    }

    public function indexWithIdGET($id) {
        if (!$this->checkLogin()) {
            $this->delegateToLoginController();

            return;
        }

        $smarty = $this->getSmarty();
        $smarty->display("UsersViewIndexWithIdGET.html");
    }

    public function editWithIdGET($id) {
        if (!$this->checkLogin()) {
            $this->delegateToLoginController();

            return;
        }

        if (is_null($id) || empty($id)) {
            throw new Exception();
	}

        $smarty = $this->getSmarty();
        $smarty->display("UsersViewEditWithIdGET.html");
    }

    public function editWithIdPOST($id) {
        if (!$this->checkLogin()) {
            $this->delegateToLoginController();

            return;
        }

        if (is_null($id) || empty($id)) {
            throw new Exception();
	}

        $smarty = $this->getSmarty();
        $smarty->display("UsersViewEditWithIdPOST.html");
    }
}
?>
