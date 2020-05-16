<?php
class LoginModel {
    private $id = null;

    public function getId() {
        return $this->id;
    }

    public function checkLogin() {
        if ($_POST["userId"] === "yosuke_naito" && $_POST["password"] === "password") {
            $this->id = 1;

            return true;
        } else {
            return false;
        }
    }
}
?>
