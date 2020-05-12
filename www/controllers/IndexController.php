<?php
include("../controllers/Controller.php");

class IndexController extends Controller {
    public function beforeIndex() {
        if (!$this->checkLogin()) {
            $this->delegateToLogin();

            return;
        }

        echo "hello, world";
        echo "<form method=\"POST\" name=\"form1\" action=\"/logout\"><a href=\"javascript:form1.submit()\">ログアウト</a></form>";
    }
}
?>
