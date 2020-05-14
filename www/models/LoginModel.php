<?php
class LoginModel {
    private $userId = null;

    public function getUserId() {
        return $this->userId;
    }

    public function checkLogin() {
        if ($_POST["userId"] === "yosuke_naito" && $_POST["password"] === "password") {
            $this->userId = $_POST["userId"];

            return true;
        } else {
            return false;
        }
    }
}
?>
