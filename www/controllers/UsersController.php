<?php
include("../controllers/Controller.php");

class UsersController extends Controller {
    private $id;

    public function beforeIndex() {
        if (!$this->checkLogin()) {
            $this->delegateToLogin();

            return;
        }

        echo "<form method=\"POST\" name=\"form1\" action=\"/logout\"><a href=\"javascript:form1.submit()\">ログアウト</a></form>";
    }

    public function afterIndex() {
    }

    public function beforeEdit($id) {
        if (!$this->checkLogin()) {
            $this->delegateToLogin();

            return;
        }

        if (is_null($id) || empty($id)) {
            throw new Exception();
	}

        echo $id . "<br/>";
    }

    public function afterEdit() {
    }
}
?>
