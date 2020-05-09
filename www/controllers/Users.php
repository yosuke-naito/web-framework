<?php
class Users {
    private $id;

    function beforeEdit($id) {
        if (is_null($id) || empty($id)) {
            throw new Exception();
	}

        echo $id . "<br/>";
    }

    function afterEdit() {
    }
}
?>
