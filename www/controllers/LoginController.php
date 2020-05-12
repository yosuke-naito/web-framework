<?php
include("../models/LoginModel.php");
//include("../views/LoginView.php");

class LoginController {
    public function beforeIndex() {
        echo "<!DOCTYPE html>
            <html>
<head>
<title>ログイン</title>
</head>
<body>
<form action=\"/login\" method=\"POST\">
ユーザID: <input type=\"text\" name=\"name\"></input><br/>
パスワード: <input type=\"password\" name=\"password\"></input>
<input type=\"submit\">
</form>
</body>
</html>";
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
