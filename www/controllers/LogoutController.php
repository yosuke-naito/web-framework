<?php
include("../controllers/IndexController.php");

class LogoutController {
    public function beforeIndex() {
    }

    public function afterIndex() {
        session_destroy();
        echo "ログアウトしました。<br/><a href=\"/\">ホームページに戻る</a>";
    }
}
?>
