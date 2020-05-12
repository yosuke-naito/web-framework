<?php
include("../models/LoginModel.php");

class LoginController extends Controller {
    public function beforeIndex() {
        $smarty = $this->getSmarty();
        $smarty->display("LoginViewBeforeIndex.html");
    }

    public function afterIndex() {
        $loginModel = new LoginModel();

        if ($loginModel->checkLogin()) {
            session_regenerate_id();
            $_SESSION["user_id"] = $loginModel->getUserId();

            echo "ようこそ、" . $_SESSION["user_id"] . "さん。<br/>";
            echo "<form method=\"POST\" name=\"form1\" action=\"/logout\"><a href=\"javascript:form1.submit()\">ログアウト</a></form>";
        } else {
            $this->beforeIndex();
        }
    }
}
?>
