<?php
class LoginModel {
    private $userId = null;

    public function getUserId() {
        return $this->userId;
    }

    public function checkLogin() {
        if ($_POST["name"] === "yosuke_naito" && $_POST["password"] === "password") {
            $this->userId = $_POST["name"];

            return true;
        } else {
            return false;
        }
    }
}
?>
